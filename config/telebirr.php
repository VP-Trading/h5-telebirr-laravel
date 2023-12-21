<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Test Mode
    |--------------------------------------------------------------------------
    |
    | This value is true when in development
    | Change the value to false in production
    |
    */

    "test_mode" => env('TELEBIRR_TEST_MODE', true),

    /*
    |--------------------------------------------------------------------------
    | Base URL
    |--------------------------------------------------------------------------
    |
    | This value is the URL provided by Ethio Telecome
    | This is the product URL without the URI
    |
    */

    "url" => env('TELEBIRR_BASE_URL', ''),

    /*
    |--------------------------------------------------------------------------
    | Public Key
    |--------------------------------------------------------------------------
    |
    | The public key provided by ethio telecom
    |
    |
    */

    "publicKey" => env('TELEBIRR_PUBLIC_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | TEST Public Key
    |--------------------------------------------------------------------------
    |
    | The TEST public key provided by ethio telecom
    |
    */

    "test_publicKey" => env('TELEBIRR_TEST_PUBLIC_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | App Key
    |--------------------------------------------------------------------------
    |
    | The app key provided by ethio telecom
    |
    */

    "appKey" => env('TELEBIRR_APP_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | TEST App Key
    |--------------------------------------------------------------------------
    |
    | The TEST app key provided by ethio telecom
    |
    */

    "test_appKey" => env('TELEBIRR_TEST_APP_KEY', ''),



    /*
    |--------------------------------------------------------------------------
    | Application ID
    |--------------------------------------------------------------------------
    |
    | This value is the application id provided by
    | Ethio Telecom's Telebirr
    |
    */

    "appId" => env('TELEBIRR_APP_ID', ''),

    /*
    |--------------------------------------------------------------------------
    | Timeout Express
    |--------------------------------------------------------------------------
    |
    | Indicates the latest payment time allowed for an order
    | The transaction will be closed if the order expires, in minutes.
    |
    */

    "timeoutExpress" => env('TELEBIRR_TIMEOUT_EXPRESS', 30),

    /*
    |--------------------------------------------------------------------------
    | Short Code
    |--------------------------------------------------------------------------
    |
    | Merchant Short Code provided by Ethio Telecom
    |
    */

    "shortCode" => env('TELEBIRR_SHORT_CODE', ''),

    /*
    |--------------------------------------------------------------------------
    | Reciepient Name
    |--------------------------------------------------------------------------
    |
    | Merchant Recipient Name
    | This will be displayed during checkout
    |
    */

    "receiveName" => env('TELEBIRR_RECEIVE_NAME', ''),

    /*
    |--------------------------------------------------------------------------
    | Notification Url
    |--------------------------------------------------------------------------
    |
    | Payment result notification url.
    | HTTP/HTTPS path for the mobile money AppServer to proactively
    | notify the merchant server of the payment result.
    | If this parameter is left blank, no notification is sent.
    | During production your server will be connected with Telebirr's
    | server through a VPN and this value will be a local ip address like
    | 10.0.1.45 adding the URI like '/notify'
    |
    | In linux you can find the VPN IP address buy running
    | ifconfig <interface name> | awk -F ' *|:' '/inet/{print$3}'
    |
    */

    "notifyUrl" => '',

    /*
    |--------------------------------------------------------------------------
    | Test Base URL
    |--------------------------------------------------------------------------
    |
    | This value is the TEST URL provided by Ethio Telecome
    | This is the product URL without the URI
    |
    */

    "test_url" => env('TELEBIRR_TEST_BASE_URL', ''),

    /*
    |--------------------------------------------------------------------------
    | Test Application ID
    |--------------------------------------------------------------------------
    |
    | This value is the TEST application id provided by
    | Ethio Telecom's Telebirr
    |
    */

    "test_appId" => env('TELEBIRR_TEST_APP_ID', ''),

    /*
    |--------------------------------------------------------------------------
    | Test Short Code
    |--------------------------------------------------------------------------
    |
    | TEST Merchant Short Code provided by Ethio Telecom
    |
    */

    "test_shortCode" => env('TELEBIRR_TEST_SHORT_CODE', ''),

    /*
    |--------------------------------------------------------------------------
    | Test Notification Url
    |--------------------------------------------------------------------------
    |
    | TEST payment result notification url.
    | HTTP/HTTPS path for the mobile money AppServer to proactively
    | notify the merchant server of the payment result.
    | If this parameter is left blank, no notification is sent.
    |
    */

    "test_notifyUrl" => '',

    /*
    |--------------------------------------------------------------------------
    | Webhook URL
    |--------------------------------------------------------------------------
    |
    | Webhook URL for your system
    |
    | eg: 'https://telebirr.testdomain.com/webhook
    */

    "webhook_url" => '',
];
