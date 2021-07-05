<?php
use Yoti\Profile;
use Yoti;
try{
$oneTimeUseToken = $_GET['token'];
require_once ('./vendor/autoload.php');
$client = new \Yoti\YotiClient('1acff0c8-7717-4515-9b84-c3ebad3ea382', '/home/personalattentio/public_html/developing-streaming/yoti/keys/pornartistzone.com-access-security.pem');

//print_r($client);die;

$activityDetails = $client->getActivityDetails($oneTimeUseToken);

//print_r($activityDetails);die;

$applicationProfile = $activityDetails->getApplicationProfile();

$applicationName = $applicationProfile->getApplicationName()->getValue();


$profile = $activityDetails->getProfile();

$emailAddress = $profile->getEmailAddress()->getValue();

print_r($emailAddress);die;

}

catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}

?>