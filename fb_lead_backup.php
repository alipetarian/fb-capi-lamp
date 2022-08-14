<?php 

$event_id = md5(uniqid(rand(), true));
echo "EVENT_ID => $event_id <br/>";
$order_id = (string)rand(1,99999);

?>


<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '544951920257076');
  fbq('track','PageView');
  fbq('track', 'Lead');
  
</script>

<!-- End Facebook Pixel Code -->

<?php

$data = array( // main object
  "data" => array( // data array
    array(
      "event_name" => "Lead",
      "event_time" => time(),
      "event_id" => $event_id,
      "user_data" => array(
        "client_user_agent" => $browser_agent,
        "fbp" => $fbp,
        "fbc" => $fbc
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

echo "<h3>FB Lead Event Data</h3>";

echo '<pre>' . print_r( $data, true ) . '</pre>';
// print_r($data);
echo '<pre>' . print_r( $_COOKIE, true ) . '</pre>';


// $dataString=json_encode($data);
// $ch = curl_init($url);                                                                      
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
// curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);                                                                  
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
// curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
//   'Content-Type: application/json',                                                                                
//   'Content-Length: ' . strlen($dataString))                                                                       
// );               

// $response = curl_exec($ch);

// echo "<pre>";
// print_r($response);
// echo "</pre>";

echo "<br> AFTER RESPONSE - 1 <br/>";
?>