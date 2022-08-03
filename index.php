<?php
$FB_PIXEL_ID=544951920257076;
$FB_CAPI_TOKEN="EAADEZCTa2EW4BAIL1V9jI7WH1PcGunhuRrgZBIvWxCsdS9eQPeaXKbp13uM1eLlpgKtASnMhFxsSIlprHZApYsyQoiNC230sASEL8dAMcZBmet468MtKZCG6SrjavYyVIawgg39zmC5B2OfHZAyFsqIdwlwp0CivAl3o52ug5RsQXeIX3Rd5QE";
$event_id = rand();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FB Conversion API Home </title>
</head>
<body>

<h3>Home page Facebook Conversion API</h3>


<?php 

echo "PHP CODE GOES HERE"; 
echo "<br/> $event_id"

?>
 <!-- FB Browser Code -->

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



<noscript><img height="1" width="1" style="display:none"
  src="<?php echo 'https://www.facebook.com/tr?id='.$FB_PIXEL_ID.'&ev=PageView&eid='.$event_id.'&noscript=1' ?>";
/></noscript>

</body>
</html>