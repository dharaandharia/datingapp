<?php
$autoload = base_path('vendor/autoload.php');
require_once($autoload);
//API initialization - Configure your online store information
$GLOBALS['ACCESS_TOKEN'] = "{{EAAAEKkuvoWLe0xrOiyy7DbrcRBMnI46e8jeqpWKFQcvbUBpILny4W4Dio9T5AmF}}";
$GLOBALS['STORE_NAME'] = "{{Wegatyu}}";
$GLOBALS['LOCATION_ID'] = ""; // We'll set this in a moment
$GLOBALS['API_CLIENT_SET'] = false;

/*require 'vendor/autoload.php';

use SquareConnect\Configuration;
use SquareConnect\ApiClient;

$access_token = 'YOUR_ACCESS_TOKEN';
# setup authorization
$api_config = new Configuration();
$api_config->setHost("https://connect.squareup.com");
$api_config->setAccessToken($access_token);
$api_client = new ApiClient($api_config);*/
?>

