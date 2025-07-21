<?php
    // to access the track_parcel() function
    include('functions.php');

    // fetch your pracel tracking code from the database for the specific order no/invoice-no
    // -- Run SQL query to get the `tracking_code`

    // Example tracking code, replace with actual code from your database
    $order_tarcking_code = "123456789"; 

    // Parcel Status Preview
    if (isset($order_tarcking_code)) {
        $status = track_parcel($order['tracking_code']);
    } else {
        $status = "Not Added";
    }

    // Display the parcel status
    echo $status; 
    
?>