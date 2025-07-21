<?php
    // to access the track_parcel() function
    include('functions.php');

    // Parcel Status Preview
    if (isset($order['tracking_code'])) {
        $status = track_parcel($order['tracking_code']);
    } else {
        $status = "Not Added";
    }

    // Display the parcel status
    echo $status; 
    
?>