fbq('track', 'Lead', {}, {eventID: "<?php echo $event_id; ?>"});


fbq('track','PageView',{},{eventID: "<?php echo $event_id; ?>"});

<noscript><img height="1" width="1" style="display:none"
  src="<?php echo 'https://www.facebook.com/tr?id='.$FB_PIXEL_ID.'&ev=PageView&eid='.$event_id.'&noscript=1' ?>";
/></noscript>