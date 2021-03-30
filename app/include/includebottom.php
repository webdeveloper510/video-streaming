<?php
//Written By Juthawong Naisanguansee
if(session_id() == ''){
 session_start(); 
}
error_reporting(0);
$out2 = ob_get_contents();
if(strpos($out2, "<video")||strpos($out2, "<audio")||strpos($out2, "<source")){
 ob_clean();
 if(strpos($out2,"<safe")==false){
  $window = md5(time());
  $_SESSION['window'] = $window;
  ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
  <script>
  var url = "{{ URL::to('/')}}";
  $.ajax({
    type: "POST",
    url: url+"/app/include/enable.php",
	data:{},
	success:function(data){
		console.log(data);
	}
  });


  </script>



  <?php
  if(strpos($out2,"<safe")!==false){
    $_SESSION['safe']="SAFE";
  }
  function getURL($matches) {

   
	
    global $rootURL;

    $rootURL = URL::to("/");
    if($_SESSION['defat']==""){
      $_SESSION['defat'] = 1;
    }else{
      $_SESSION['defat'] = $_SESSION['defat'] + 1;
    }
    $_SESSION['x'.$matches['2'].$_SESSION['defat']]=0;
    $_SESSION['defa'.$matches['2'].$_SESSION['defat']] = md5(time()."Defa Protector");
    $_SESSION['imdefa'.$_SESSION['defat']]=md5('Defa').base64_encode(base64_encode($matches['2']));
    $_SESSION['x'.$matches['2']]=0;
    $_SESSION['defa'.$matches['2']] = md5(time()."Defa Protector");
    $_SESSION['file'.$_SESSION['defat']] = md5('Defa').base64_encode(base64_encode($matches['2']));
    return $matches[1] .  $rootURL."/app/defavid.php?window=".$_SESSION['window']."&defat=".$_SESSION['defat'];
  }
  $mes = preg_replace_callback("/(<video[^>]*src *= *[\"']?)([^\"']*)/i", getURL, $out2);
  $mes = preg_replace_callback("/(<source[^>]*src *= *[\"']?)([^\"']*)/i", getURL, $mes);
  $mes = preg_replace_callback("/(<audio[^>]*src *= *[\"']?)([^\"']*)/i", getURL, $mes);
  echo $mes;
}else{
  echo $out2;
}}
?>