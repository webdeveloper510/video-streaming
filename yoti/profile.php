<?php
// require_once './vendor/autoload.php';
// 


try{
$oneTimeUseToken = $_GET['token'];
include('./vendor/autoload.php');

$client = new \Yoti\YotiClient('3c6b5f75-5e38-44b3-b50d-33e8925adcae', '/home/personalattentio/public_html/developing-streaming/yoti/keys/verify.pem');

$activityDetails = $client->getActivityDetails($oneTimeUseToken);

$profile = $activityDetails->getProfile();

$emailAddress = $profile->getEmailAddress()->getValue();

print_r($emailAddress);die;

}

catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}

?>