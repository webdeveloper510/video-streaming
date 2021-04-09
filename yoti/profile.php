<?php
use Yoti\Profile;
use Yoti;
try{

include('./vendor/autoload.php');

$oneTimeUseToken = $_GET['token'];

$client = new \Yoti\YotiClient('3c6b5f75-5e38-44b3-b50d-33e8925adcae', './keys/verify.pem');

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