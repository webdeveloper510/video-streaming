<?php
// require_once './vendor/autoload.php';
// 


try{

include('./vendor/autoload.php');
echo $oneTimeUseToken = $_GET['token'];
$client = new \Yoti\YotiClient('3c6b5f75-5e38-44b3-b50d-33e8925adcae', '/home/personalattentio/public_html/developing-streaming/yoti/keys/verify.pem');

print_r($client);die;

$activityDetails = $client->getActivityDetails($oneTimeUseToken);

$applicationProfile = $activityDetails->getApplicationProfile();

$applicationName = $applicationProfile->getApplicationName()->getValue();


$profile = $activityDetails->getProfile();

$emailAddress = $profile->getEmailAddress()->getValue();

print_r($applicationName);die;

}

catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}

?>