<?php
//This version using Ampare Protector Professional Technology. We give it for free to the world that mean I lose a chance of getting 200,000 USD for every download user. Please donate us : http://www.juthawong.com/donate
ob_start();
if(session_id() == ''){
   session_start(); 
}
$window = addslashes(strip_tags($_GET['window']));
$md5defa = md5('Defa');
$t = (int)$_GET['defat'];

$filedefa = str_replace($md5defa,'',$_SESSION['file'.$t]);
//print_r($_SESSION['file'.$t]);die;
$file = str_replace("https://","http://",base64_decode(base64_decode($filedefa)));

$defa = str_replace("https://","http://",base64_decode(base64_decode($filedefa)));
$defaurl = get_headers($file, 1);

$url = $defaurl["Location"];
//print_r($defaurl);die;
//$url = 'http://localhost/laravel/video-streaming/app/defavid.php?window=681a0a8021b288adb3d97d7748b05e19&defat=85';
if($url!=$file&&$url!=""){
    $file = $url;
}
if (!function_exists('http_response_code'))
{
    function http_response_code($newcode = NULL)
    {
        static $code = 200;
        if($newcode !== NULL)
        {
            header('X-PHP-Response-Code: '.$newcode, true, $newcode);
            if(!headers_sent())
                $code = $newcode;
        }       
        return $code;
    }
}
$header = http_response_code();
$header2 = getallheaders();
function isMobile() {
    return preg_match("/(MSIE|Edge|android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
if(isset($_SESSION['jsenable'.$window])){
	if($header==200&&$header2['Accept']!=""&&$_SESSION['x'.$defa.$t]==0&&isMobile()||isset($_SERVER['HTTP_RANGE'])){

        $_SESSION['x'.$defa.$t] = $_SESSION['x'.$defa.$t] + 1;
//Written By Juthawong Naisanguansee at Ampare Engine
        if(isset($_SERVER['HTTP_RANGE'])){
            $opts['http']['header']="Range: ".$_SERVER['HTTP_RANGE'];
        }
        $opts['http']['method']= "HEAD";

        $conh=stream_context_create($opts);

        $opts['http']['method']= "GET";

        $cong= stream_context_create($opts);

        $out[]= file_get_contents($file,false,$conh);

        $out[]= $http_response_header;

        ob_end_clean();

        array_map("header",$http_response_header);

        readfile($file,false,$cong);
        die();
    }
}
?>