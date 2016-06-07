<?php
require('vendor/autoload.php');

$sid = "ACCOUNT_SID"; // Your Account SID from www.twilio.com/console
$token = "ACCOUNT_TOKEN"; // Your Auth Token from www.twilio.com/console

$client = new Twilio\Rest\Client($sid, $token);

$command = "";

if (strpos(strtolower($_REQUEST['Body']), 'where') !== FALSE) {
    $command = "where " . trim($_REQUEST['From']);
}else{
    die();
}

$client->preview->wireless->commands->create(DEVICE_SID, $command,
    array()
);
