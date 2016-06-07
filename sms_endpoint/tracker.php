<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('vendor/autoload.php');

$sid = "AC8ed2351ef2156d21a66faf913443188c"; // Your Account SID from www.twilio.com/console
$token = "954e46f7be824414cb6b42aadd85232f"; // Your Auth Token from www.twilio.com/console

$client = new Twilio\Rest\Client($sid, $token);

$command = "";

if (strpos(strtolower($_REQUEST['Body']), 'where') !== FALSE) {
    $command = "where " . trim($_REQUEST['From']);
}else{
    die();
}

$client->preview->wireless->commands->create('DE8636e37d538c45888b8884582f3c7d01', $command,
    array(
        'callbackUrl' => "https://devicemanager.mycompany.com/devices/524116518656369/commands"
    )
);
