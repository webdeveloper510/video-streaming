<?php
// require_once './vendor/autoload.php';
// 


try{

$token = $_GET['token'];


include('./vendor/autoload.php');
$client = new \Yoti\YotiClient('a134bb6d-b208-42b3-b777-9d1a627c3efd', './keys/ageVerify.pem');

$activityDetails = $client->getActivityDetails($token);

print_r($activityDetails);die;



    

}

catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}

?>