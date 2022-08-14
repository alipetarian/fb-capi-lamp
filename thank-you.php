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
  <title>Thank You Page</title>

  <?php
    include('./fb_page_view.php');  // PageView Event Both Server and Broswer side
    include('./fb_purchase.php'); // Server Pixel
  ?>
</head>
<body>
  <h3>This is thank you page</h3>

  <br/><br/><hr/>

  <script>
    setTimeout(() => {
      console.log("Time Out here -3 ");
      fbq('track', 'Purchase', {currency: "USD", value: <?php echo $order_total; ?>}, { eventID: '<?php echo $event_id; ?>' });
    }, 10000);
  </script>
</body>
</html>