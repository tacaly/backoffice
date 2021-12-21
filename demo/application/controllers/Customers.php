<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->not_logged_in();

        $this->data['page_title'] = 'Customers';

        $this->load->model('model_customers');
    }

    /*
	* It only redirects to the manage customers page
	*/
    public function index()
    {

        if(!in_array('viewCustomers', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $this->render_template('customers/index', $this->data);
    }
    /*
	* It checks if it gets the customers id and retreives
	* the customers information from the customers model and
	* returns the data into json format.
	* This function is invoked from the view page.
	*/
    public function fetchCustomersDataById($id)
    {
        if($id) {
            $data = $this->model_customers->getCategoryData($id);
            echo json_encode($data);
        }

        return false;
    }

    /*
    * Fetches the customers value from the customers table
    * this function is called from the datatable ajax function
    */
    public function fetchCustomersData()
    {
        $result = array('data' => array());

        $data = $this->model_customers->getCustomersData();

        foreach ($data as $key => $value) {

            // button
            $buttons = '';

            if(in_array('updateCustomers', $this->permission)) {
                $buttons .= '<button type="button" class="btn btn-default" onclick="editFunc('.$value['id'].')" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></button>';
            }

            if(in_array('deleteCustomers', $this->permission)) {
                $buttons .= ' <button type="button" class="btn btn-default" onclick="removeFunc('.$value['id'].')" data-toggle="modal" data-target="#removeModal"><i class="fa fa-trash"></i></button>';
            }


            $status = ($value['active'] == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-warning">Inactive</span>';

            $result['data'][$key] = array(
                $value['name'],
                $status,
                $buttons
            );
        } // /foreach

        echo json_encode($result);
    }

    /*
    * Its checks the customers form validation
    * and if the validation is successfully then it inserts the data into the database
    * and returns the json format operation messages
    */
    public function create()
    {
        if(!in_array('createCustomers', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $response = array();

        $this->form_validation->set_rules('customers_name', 'Customers name', 'trim|required');
        $this->form_validation->set_rules('active', 'Active', 'trim|required');

        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'name' => $this->input->post('customers_name'),
                'active' => $this->input->post('active'),
            );

            $create = $this->model_customers->create($data);
            if($create == true) {
                $response['success'] = true;
                $response['messages'] = 'Succesfully created';
            }
            else {
                $response['success'] = false;
                $response['messages'] = 'Error in the database while creating the brand information';
            }
        }
        else {
            $response['success'] = false;
            foreach ($_POST as $key => $value) {
                $response['messages'][$key] = form_error($key);
            }
        }

        echo json_encode($response);
    }

    /*
    * Its checks the customers form validation
    * and if the validation is successfully then it updates the data into the database
    * and returns the json format operation messages
    */
    public function update($id)
    {

        if(!in_array('updateCustomers', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $response = array();

        if($id) {
            $this->form_validation->set_rules('edit_customers_name', 'Customers name', 'trim|required');
            $this->form_validation->set_rules('edit_active', 'Active', 'trim|required');

            $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

            if ($this->form_validation->run() == TRUE) {
                $data = array(
                    'name' => $this->input->post('edit_customers_name'),
                    'active' => $this->input->post('edit_active'),
                );

                $update = $this->model_customers->update($data, $id);
                if($update == true) {
                    $response['success'] = true;
                    $response['messages'] = 'Succesfully updated';
                }
                else {
                    $response['success'] = false;
                    $response['messages'] = 'Error in the database while updated the brand information';
                }
            }
            else {
                $response['success'] = false;
                foreach ($_POST as $key => $value) {
                    $response['messages'][$key] = form_error($key);
                }
            }
        }
        else {
            $response['success'] = false;
            $response['messages'] = 'Error please refresh the page again!!';
        }

        echo json_encode($response);
    }

    /*
    * It removes the customers information from the database
    * and returns the json format operation messages
    */
    public function remove()
    {
        if(!in_array('deleteCustomers', $this->permission)) {
            redirect('dashboard', 'refresh');
        }

        $customers_id = $this->input->post('customers_id');

        $response = array();
        if($customers_id) {
            $delete = $this->model_customers->remove($customers_id);
            if($delete == true) {
                $response['success'] = true;
                $response['messages'] = "Successfully removed";
            }
            else {
                $response['success'] = false;
                $response['messages'] = "Error in the database while removing the brand information";
            }
        }
        else {
            $response['success'] = false;
            $response['messages'] = "Refersh the page again!!";
        }

        echo json_encode($response);
    }
}