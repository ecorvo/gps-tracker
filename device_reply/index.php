<?php


require_once 'vendor/autoload.php';
$sid = "ACCOUNT_SID"; // Your Account SID from www.twilio.com/console
$token = "ACCOUNT_TOKEN"; // Your Auth Token from www.twilio.com/console
/** Twilio client */
$client = new Services_Twilio($sid, $token);

/** Check for GPS signal status */
if ($_GET['signal'] == 'false') {
    $client->account->messages->create(array(
        'To' => trim($_GET['text_to']),
        'From' => "+13053631669",
        'Body' => 'Location Unknown'
    ));
    die();
}

/** fetch image from google using coordinates */
$url = "https://maps.googleapis.com/maps/api/staticmap?center=" . $_GET['lat'] . "," . $_GET['lon'] . "&zoom=16&size=362x180&markers=color:green|size:mid|label:H|" . $_GET['lat'] . "," . $_GET['lon'] . "&sensor=false&key=API_KEY";
file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/find_my_device/tmp_files/tmp_g_map.png", file_get_contents($url));

/** send MMS */
$client->account->messages->create(array(
    'To' => trim($_GET['text_to']),
    'From' => "+13053631669",
    'Body' => $_GET['lat'] . "," . $_GET['lon'],
    'MediaUrl' => 'http://utility.liveanswer.com/find_my_device/tmp_files/tmp_g_map.png'
));
