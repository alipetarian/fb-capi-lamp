<?php 
$event_id = md5(uniqid(rand(), true));
echo "EVENT_ID => $event_id <br/>";
?>

<?php

$data = array( // main object
  "data" => array( // data array
    array(
      "event_name" => "Purchase",
      "event_time" => time(),
      "event_id" => $event_id,
      "user_data" => array(
        "client_user_agent" => $browser_agent,
        "fbp" => $fbp,
        "fbc" => $fbc
      ),
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

echo "<h3>FB PURCHASE Event Data</h3>";

echo '<pre>' . print_r( $data, true ) . '</pre>';
// print_r($data);
echo '<pre>' . print_r( $_COOKIE, true ) . '</pre>';


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

echo "<pre>";
print_r($response);
echo "</pre>";

echo "<br> AFTER RESPONSE - 1 <br/>";
?>