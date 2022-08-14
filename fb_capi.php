<?php
$FB_PIXEL_ID="544951920257076";
$FB_CAPI_TOKEN="EAADEZCTa2EW4BAEGLZBDjVNOSINdZAjrBqoyg1vhvPiTbCrtVW3TrVHAIZA3VSNOIfnFDfLLoOADLIY6lholSS1LlbyvjtzUmPfLtCjWJzZCGgpYuWMR9aIZA2jL6K8iaHfjVlkazxGTM1pcHW0ZCV7pdnw2Vv3qIur52bIsCZC8FyThzUN0uBlH";

$ip= $_SERVER['REMOTE_ADDR'];
echo "IP => $ip <br/>";

$browser_agent = $_SERVER['HTTP_USER_AGENT'];
echo "BROWSER AGENT => $browser_agent <br/>";

$curl = curl_init();
$url= "https://graph.facebook.com/v14.0/$FB_PIXEL_ID/events";

echo "URL => $url <br/>";

$event_source_url= (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
echo "EVENT_SOURCE_URL => $event_source_url <br/>";

echo "<pre>";
print_r($_COOKIE);
echo "</pre>";

if(isset($_COOKIE['_fbp'])){
  $fbp= $_COOKIE['_fbp'];
  echo "COOKIE_FBP => $fbp <br/>";
} else{
  $fbp= "";
  echo "GENERATED_FBP => $fbp <br/>";
}


if(isset($_COOKIE['_fbc'])){
  $fbc = $_COOKIE['_fbc'];
  echo "COOKIE_FBC => $fbc <br/>";
} else {
  $fbc= "";
  echo "GENERATED_FBC => $fbc <br/>";
}

$order_total =  0.00;

if(isset($_GET['order_total']) && !empty($_GET['order_total'])){
  $order_total = $_GET['order_total'];
  $formattedOrderTotal= floatval(number_format($order_total,2)); // show in floating upto two decimal places
  echo "ORDER_TOTAL => $order_total <br/>";
}

if(isset($_GET['test_event_code'])){
  $test_event_code = $_GET['test_event_code'];
  echo "TEST_EVENT_CODE => $test_event_code <br/>";
}

?>