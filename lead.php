<?php
error_reporting(E_ALL);
include('./fb_capi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lead Page</title>
  <?php
  ?>
  <!-- Meta Pixel Code -->
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
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=544951920257076&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
</head>
<body>
  <h3>This is Lead page</h3>
<?php
//  include('./fb_page_view.php');


 echo "<br/><br/><hr/>";

//  include('./fb_lead.php');
?>

<br/>
<button onclick="fbq('track', 'Lead');">Trigger Lead</button>

<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magni tempora beatae ipsum. Quas fuga repudiandae necessitatibus quod debitis impedit, mollitia, dolor deleniti quae eum totam, tempore nam eius in provident?</p>

<h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, nam autem enim accusamus, deserunt cupiditate eum dignissimos ad officia adipisci corrupti mollitia expedita consequuntur nisi dicta ratione corporis. Atque, reiciendis?</h3>

<hr>

<button onclick="fbq('track', 'ViewContent');">View content</button>


<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis laborum totam voluptate fugiat quod perferendis dolor minima cupiditate ullam voluptas, quasi, aperiam quae ipsa veniam alias temporibus. Consequatur, cupiditate ipsa.</p>


</body>
</html>