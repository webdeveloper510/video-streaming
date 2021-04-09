<?php
// require_once './vendor/autoload.php';
// 


try{

$token = $_GET['token'];

echo $token;
include('./vendor/autoload.php');
$client = new \Yoti\YotiClient('a134bb6d-b208-42b3-b777-9d1a627c3efd', '/home/personalattentio/public_html/developing-streaming/yoti/keys/ageVerify.pem');

$activityDetails = $client->getActivityDetails($token);

$profile = $activityDetails->getProfile();

$fullName = $profile->getFullName()->getValue();

print_r($fullName);die;



    

}

catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}

?>