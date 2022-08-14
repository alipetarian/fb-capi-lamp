<?php
$FB_PIXEL_ID="544951920257076";
$FB_CAPI_TOKEN="EAADEZCTa2EW4BAEGLZBDjVNOSINdZAjrBqoyg1vhvPiTbCrtVW3TrVHAIZA3VSNOIfnFDfLLoOADLIY6lholSS1LlbyvjtzUmPfLtCjWJzZCGgpYuWMR9aIZA2jL6K8iaHfjVlkazxGTM1pcHW0ZCV7pdnw2Vv3qIur52bIsCZC8FyThzUN0uBlH";
$show_php_logs= FALSE;
if(isset($_GET['php_logs']) && !empty($_GET['php_logs'])){
  $show_php_logs= TRUE;
}

if($show_php_logs == TRUE){
  error_reporting(E_ALL);
}

$ip= $_SERVER['REMOTE_ADDR'];
if($show_php_logs == TRUE){
  echo "IP => $ip <br/>";
}

$browser_agent = $_SERVER['HTTP_USER_AGENT'];
if($show_php_logs == TRUE){
  echo "BROWSER AGENT => $browser_agent <br/>";  
}

$curl = curl_init();
$url= "https://graph.facebook.com/v14.0/$FB_PIXEL_ID/events";

if($show_php_logs == TRUE){
 echo "URL => $url <br/>";
}

$event_source_url= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if($show_php_logs == TRUE){
  echo "EVENT_SOURCE_URL => $event_source_url <br/>";
}


if($show_php_logs == TRUE){
  echo "COOKIES <br/>";
  echo "<pre>";
  print_r($_COOKIE);
  echo "</pre>";
}

if(isset($_COOKIE['_fbp'])){
  $fbp= $_COOKIE['_fbp'];
  if($show_php_logs == TRUE){
    echo "COOKIE_FBP => $fbp <br/>";
  }
} else{
  $fbp= "";
  if($show_php_logs == TRUE){
    echo "GENERATED_FBP => $fbp <br/>";
  }
}


if(isset($_COOKIE['_fbc'])){
  $fbc = $_COOKIE['_fbc'];
  if($show_php_logs == TRUE){
    echo "COOKIE_FBC => $fbc <br/>";
  }
} else {
  $fbc= "";
  if($show_php_logs == TRUE){
    echo "GENERATED_FBC => $fbc <br/>";
  }
}

$order_total =  0.00;

if(isset($_GET['order_total']) && !empty($_GET['order_total'])){
  $order_total = $_GET['order_total'];
  $formattedOrderTotal= floatval(number_format($order_total,2)); // show in floating upto two decimal places
  if($show_php_logs == TRUE){
    echo "ORDER_TOTAL => $order_total <br/>";
  }
}

$test_event_code="";
if(isset($_GET['test_event_code'])){
  $test_event_code = $_GET['test_event_code'];
  if($show_php_logs == TRUE){
    echo "TEST_EVENT_CODE => $test_event_code <br/>";
  }
}

?>