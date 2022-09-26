<?php 
$event_id = md5(uniqid(rand(), true));
if($show_php_logs == TRUE){
  echo "EVENT_ID => $event_id <br/>";
}


$user_data= array(
  "client_user_agent" => $browser_agent,
  "client_ip_address" => $ip,
  "country" => $countryHashed,
  "ct" => $cityHashed,
  "st" => $stateHashed
);

if(!empty($fbp)){
  $user_data["fbp"]= $fbp;
}

if(!empty($fbc)){
  $user_data["fbc"]= $fbc;
}


$data = array( // main object
  "data" => array( // data array
    array(
      "event_name" => "Purchase",
      "event_time" => time(),
      "event_id" => $event_id,
      "user_data" => $user_data,
      "custom_data" => array(
        "currency" => "USD",
        "value"    => $order_total
      ),
      "action_source" => "website",
      "event_source_url"  => $event_source_url,
    ),
  ),
  "access_token" => $FB_CAPI_TOKEN
);

if(!empty($test_event_code)){
  $data["test_event_code"] = $test_event_code;
}
if($show_php_logs == TRUE){
echo "<h3>FB PURCHASE Event Data</h3>";
echo '<pre>' . print_r( $data, true ) . '</pre>';
echo '<pre>' . print_r( $_COOKIE, true ) . '</pre>';
}

$dataString=json_encode($data);
$ch = curl_init($url);                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
  'Content-Type: application/json',                                                                                
  'Content-Length: ' . strlen($dataString))                                                                       
);               

$response = curl_exec($ch);

if($show_php_logs == TRUE){
  echo "<pre>";
  print_r($response);
  echo "</pre>";
}
?>