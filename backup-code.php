<!-- <noscript><img height="1" width="1" style="display:none"
  src="<?php echo 'https://www.facebook.com/tr?id='.$FB_PIXEL_ID.'&ev=PageView&eid='.$event_id.'&noscript=1' ?>";
/></noscript> -->



fbq('track','Lead',{"value":"<?php echo $order_total; ?>", "currency": "USD"},{"eventID": "<?php echo $event_id; ?>"});


<noscript><img height="1" width="1" style="display:none"
  src="<?php echo 'https://www.facebook.com/tr?id='.$FB_PIXEL_ID.'&ev=Purchase&eid='.$event_id.'&cd[value]='.$order_total.'&cd[currency]=USD'.'&noscript=1' ?>";
/></noscript>

<noscript><img height="1" width="1" style="display:none"
  src="<?php echo 'https://www.facebook.com/tr?id='.$FB_PIXEL_ID.'&ev=PageView&eid='.$event_id.'&noscript=1' ?>";
/></noscript>


<noscript><img height="1" width="1" style="display:none"
  src="<?php echo 'https://www.facebook.com/tr?id='.$FB_PIXEL_ID.'&ev=Purchase&eid='.$event_id.'&cd[value]='.$order_total.'&cd[currency]=USD&cd[order_id]='.$order_id.'&noscript=1' ?>";
/></noscript>



// fbq('track','Lead',{},{
  //     eventID: "<?php echo $event_id; ?>"
  //   });


  // fbq('track','Purchase',{
  //   value:<?php echo $order_total; ?>, 
  //   currency: 'USD'
  //   },{
  //     eventID: '<?php echo $event_id; ?>'
  //   });