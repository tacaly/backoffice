[![PHP Composer](https://github.com/tacaly/backoffice/actions/workflows/php.yml/badge.svg)](https://github.com/tacaly/backoffice/actions/workflows/php.yml)

# lager System (Backoffice)
Lager system med stregkode scanner og seddeler.

Bruger MVC modelen (Model-View-Controller) codeigniter 4.
Der er inbygget et API REST system og et auto-gen DOC system. http://daux.io/

## Krav til installation

 - En "Dependency Manager" så som [Composer](https://getcomposer.org/download//).
 - [PHP](https://www.php.net/downloads) for vores milijø.

## Stregkode scanner

Kan acceptere følgende:
- Code 128 Auto (A, B and C)
- Code 39
- EAN13
- UPCA
- UPCE
- ITF14 (Rectangle Bearer's bar)
- I2of5
- EAN8
- ITF14 (Top/Bottom Bearer's Bar)
- 
#  Electronic Data Interchange (EDI) 
https://www.youtube.com/watch?v=S4xqLDoy5hs

Backoffice v1. Uses https://github.com/php-edifact/edifact for EDI 

Our backoffice use WEB EDI.

- GTIN = Global trade item number (GSN / EAN)
- GLN = Global Location number ( SENDER / RECIVER )
- GS1-128 Barcode to ID the TU (Transport unit)

## EDI INFORMATION EXCHANGE

The system uses the CU to ID the item name accosiated wth the TU/LU.
if the supplier sends a SSCC code the system will automaticly input it when scanned.

## Setup

installere PHP og composer:
 - ``



# CodeIgniter 4 Framework

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

This repository holds the distributable version of the framework,
including the user guide. It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
