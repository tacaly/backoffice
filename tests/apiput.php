<?php

$url = "https://publicapi.dddretail.com/Help/Api/GET-api-stocks-shopId-purchases-drafts";

/** @noinspection PhpExpressionResultUnusedInspection */
$data =
    "
    [
  {
    "shopIdDraftOwner": 0,
    "invoiceNumber": "string",
    "sequenceNumber": 0,
    "shopIdRecipient": 0,
    "invoiceDate": "2022-01-04T11:13:23.377Z",
    "paymentDate": "2022-01-04T11:13:23.377Z",
    "receiptDate": "2022-01-04T11:13:23.377Z",
    "supplier": 0,
    "variantId": 0,
    "barcode": "string",
    "quantity": 0,
    "updated": true,
    "confirmed": true
  }
]
    ";

$data2 = "";

function callAPI($method, $url, $data){
    $curl = curl_init();
    switch ($method){
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "GET":
            curl_setopt($curl, CURLOPT_READFUNCTION, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    function callAPI2($method2, $url2, $data2){
        $curl = curl_init();
        switch ($method2){
            case "POST":
                curl_setopt($curl2, CURLOPT_POST, 1);
                if ($data2)
                    curl_setopt($curl2, CURLOPT_POSTFIELDS, $data2);
                break;
            case "PUT":
                curl_setopt($curl2, CURLOPT_CUSTOMREQUEST, "PUT");
                if ($data2)
                    curl_setopt($curl2, CURLOPT_POSTFIELDS, $data2);
                break;
            case "GET":
                curl_setopt($curl2, CURLOPT_READFUNCTION, 1);
                if ($data2)
                    curl_setopt($curl2, CURLOPT_POSTFIELDS, $data2);
                break;
            default:
                if ($data2)
                    $url2 = sprintf("%s?%s", $url2, http_build_query($data2));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'TOKEN: 56DA7C89-832D-47EA-8804-564BED20E204',
            'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        if(!$result){die("Connection Failure");}
        curl_close($curl);
        return $result;

    // OPTIONS:
    curl_setopt($curl2, CURLOPT_URL, $url2);
    curl_setopt($curl2, CURLOPT_HTTPHEADER, array(
        'TOKEN: 56DA7C89-832D-47EA-8804-564BED20E204',
        'Content-Type: application/json',
    ));
    curl_setopt($curl2, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl2, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // EXECUTE:
    $result2 = curl_exec($curl2);
    if(!$result2){die("Connection Failure");}
    curl_close($curl2);
    return $result2;
}
?>