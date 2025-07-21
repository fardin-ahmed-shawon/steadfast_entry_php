<?php

//Get order no
$order_id = $_GET['order_id'];


// API INFO (Paste the merchant API info here)
$api_url = 'https://portal.packzy.com/api/v1/create_order';
$api_key = '9cud28iwftofhcep9jb6fwrqkgzhmozn ';
$secret_key = 'luehdpssclqgeswnvrqwdt1j ';


// Fetch order details according to the order_id
// --- You can run SQL query to fetch order details from your database
// ---- For demonstration, we will use static data

// Set Order Data
$invoice = 'INV-12345';
$recipient_name = 'Test User';
$recipient_phone = '01XXXXXXXXXX'; 
$recipient_address = 'Address';

// If you receive the order amount then set -> cod_amount = 0
$cod_amount = '';

// Send Order data to steadfast
$data = [
    "invoice" => $invoice,
    "recipient_name" => $recipient_name,
    "recipient_phone" => $recipient_phone,
    "recipient_address" => $recipient_address,
    "cod_amount" => $cod_amount,
    "note" => "Please Deliver Fast",
    "item_description" => "Bag",
    "delivery_type" => 0
];

// Steadfast Entry
$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Api-Key: ' . $api_key,
    'Secret-Key: ' . $secret_key,
    'Content-Type: application/json'
]);

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

if ($response === false) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    $result = json_decode($response, true);
    if ($httpcode === 200 && isset($result['consignment'])) {

        // Display the response result
        echo "Order Created To Steadfast: Tracking Code - " . $result['consignment']['tracking_code'];

        // Update tracking_code in your database table
        $tracking_code = mysqli_real_escape_string($con, $result['consignment']['tracking_code']);

        // Update the tracking code in your database
        // --- You can run SQL query to update the tracking code in your database


    } else {
        echo "Error:\n";
        print_r($result);
    }
}
curl_close($ch);
// End
?>
