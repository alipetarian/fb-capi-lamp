<?php
  error_reporting(E_ALL);
  include('./fb_capi.php'); // To Load Basic Config of Conversion API
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FB Conversion API Home </title>
  <?php
    include('./fb_page_view.php');  // PageView Event Both Server and Broswer side
  ?>
</head>
<body>

<h3>Home page Facebook Conversion API</h3>

<hr> 

<a href="<?php echo '/thank-you.php?test_event_code='.$test_event_code.'&order_total='.$order_total; ?>">Thank you page</a>
<br>
<a href="<?php echo '/lead.php?test_event_code='.$test_event_code.'&order_total='.$order_total; ?>">Lead page</a>
<br>
<br>

</body>
</html>