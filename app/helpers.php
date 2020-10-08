<?php
if (! function_exists('convertSecondstoFormat')) {
    function convertSecondstoFormat($seconds) {
        $seconds = round($seconds);
 
  		$output = sprintf('%02d:%02d:%02d', ($seconds/ 3600),($seconds/ 60 % 60), $seconds% 60);
  		return $output;
    }
}
if (! function_exists('convertUrltoSize')) {
    function convertUrltoSize($url) {
    	//echo $url;die;
       $filesize = filesize($url); // bytes
    $filesize = round($filesize / 1024 / 1024, 1);
  		return $filesize;
    }
}