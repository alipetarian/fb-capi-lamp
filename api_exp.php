
<?php
curl -X POST \
  --form-string 'data=[{"action_source":"website","event_name":"Purchase","event_time":1660137399,"custom_data":{"currency":"USD","value":142.52},"user_data":{"em":["7b17fb0bd173f625b58636fb796407c22b3d16fc78302d79f0fd30c2fc2fc068"],"ph":[]}}]'\
  -F 'access_token=<ACCESS_TOKEN>' \
  https://graph.facebook.com/<API_VERSION>/<PIXEL_ID>/events


  data=[
    { "action_source":"website",
      "event_name":"Purchase",
      "event_time":1660137399,
      "custom_data":{"currency":"USD","value":142.52},
      "user_data":{
        "em":["7b17fb0bd173f625b58636fb796407c22b3d16fc78302d79f0fd30c2fc2fc068"],"ph":[]}
    }
  ]


  "data" => array( // data array        
      array(
        "event_name" => "Purchase",
        "event_time" => time(),
        "user_data" => array(
          "client_ip_address" => $ip,
          "client_user_agent" => $browser,
          "em" => $email,
          "ph" => $phone,
          "fbc" =>'',
          "fbp" =>''
        ),
        "contents" => array(
          "id" => $item_ids,
          "quantity" => count($item_qty),
          "delivery_category"=> "home_delivery"
        ),
        "custom_data" => array(
          "currency" => "GBP",
          "value"    => $order_total,
        ),
        "action_source" => "website",
        "event_source_url"  => $fullURL,
      ),
    ),
      "access_token" => "{Access Token}"
    );  
    
    
    $dataString = json_encode($data);                                                                                                              
    $ch = curl_init('https://graph.facebook.com/v11.0/{PIxel ID}/events');                                                                      
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
    curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
        'Content-Type: application/json',                                                                                
        'Content-Length: ' . strlen($dataString))                                                                       
    );                                                                                                                                                                       
    $response = curl_exec($ch);


    ?>