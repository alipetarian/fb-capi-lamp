<?php
  $event_id = md5(uniqid(rand(), true));
  if($show_php_logs == TRUE){
    echo "EVENT_ID => $event_id <br/>";
  }
?>

<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', <?php echo $FB_PIXEL_ID; ?>);
  fbq('track','PageView',{},{eventID: "<?php echo $event_id; ?>"});
</script>

<?php

$data = array( // main object
  "data" => array( // data array
    array(
      "event_name" => "PageView",
      "event_time" => time(),
      "event_id" => $event_id,
      "user_data" => array(
        "client_ip_address" => $ip,
        "client_user_agent" => $browser_agent,
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
  echo "<h3>FB PageView Event Data</h3>";
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