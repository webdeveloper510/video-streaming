<?php
require_once './vendor/autoload.php';
$client = new \Yoti\YotiClient('a134bb6d-b208-42b3-b777-9d1a627c3efd', 'https://pornartistzone.com/developing-streaming/yoti/keys/Age Verification-access-security.pem');
$token = $_GET['token'];
echo $token;
die;
$activityDetails = $client->getActivityDetails($oneTimeUseToken);

print_r($client);
$data = [ "data" => "base64Image" ];

try{
    
    echo "hello";
    

}

catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}

?>