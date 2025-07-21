<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details Page</title>
</head>
<body>

<?php
// Order ID or Invoice No

// Sample order ID for demonstration
$order_id = 5;

?>

<!-- 
(i) If `tracking_code` is not set into your database for a specific order no/invoice-no then, display it 

(ii) If you want to send the order to Steadfast, you can use the following link to send the order details to Steadfast Entry page.
-->
<a href="steadfast-entry.php?order_id=<?= $order_id; ?>" target="_blank">
    <button>Send to Courier</button>
</a>

<!-- If `tracking_code` is exist on your database for the specific order no/invoice-no then, display it -->
<button>Already Sent</button>
    
</body>
</html>