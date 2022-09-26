<?php
$FB_PIXEL_ID="326591822583755";
$FB_CAPI_TOKEN="EAADEZCTa2EW4BAOhelslLtljsKWhdjCSycd1V87ypGrA3ZBVszNk232fF9xQ516S8ZBsiPOKzzbOIsmJXiGDc5bUHQo2NqOJtktVmQbEqGqZACy8ePQsO6X1RZBM115LW4IZCORofYkhwvAGY7wDIqvurzqUDbKCy5ssMylzM1vfD4JywVRHrq";
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


$ip_data = @json_decode(file_get_contents(
  "http://www.geoplugin.net/json.gp?ip=" . $ip));
 
$country= strtolower($ip_data->geoplugin_countryCode);
$countryHashed= hash('sha256', $country);

if($show_php_logs == TRUE){
  echo "COUNTRY => $country <br/>";
  echo "COUNTRY_HASHED => $countryHashed <br/>";
}

$city= strtolower($ip_data->geoplugin_city);
$cityHashed= hash('sha256', $city);

if($show_php_logs == TRUE){
  echo "CITY => $city <br/>";
  echo "CITY_HASHED => $cityHashed <br/>";
}

$state= strtolower($ip_data->geoplugin_regionCode);
$stateHashed= hash('sha256', $state);

if($show_php_logs == TRUE){
  echo "STATE => $state <br/>";
  echo "STATE_HASHED => $stateHashed <br/>";
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
  $fbp = 'fb.1.'.floor(microtime(true) * 1000).'.'.rand(1000000000, 2147483647);
  if($show_php_logs == TRUE){
    echo "GENERATED_FBP => $fbp <br/>";
  }
}


if(isset($_COOKIE['_fbc'])){
  $fbc = $_COOKIE['_fbc'];
  if($show_php_logs == TRUE){
    echo "COOKIE_FBC => $fbc <br/>";
  }
} elseif(isset($_GET['fbclid']) && (!empty($_GET['fbclid']))) {
  
  $fbclid=$_GET['fbclid'];
  $fbc = 'fb.1.'.floor(microtime(true) * 1000).'.'.$fbclid;

  if($show_php_logs == TRUE){
    echo "GENERATED_FBC => $fbc <br/>";
  }
} else{
  $fbc="";
  if($show_php_logs == TRUE){
    echo "FBC can not generated as fbclid is not avialable in query params => $fbc <br/>";
  }
}

$order_total =  10.00;

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