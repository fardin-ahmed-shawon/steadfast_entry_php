<?php
    // steadfast parcel track
    function track_parcel($tracking_code) {
        // API info
        $api_url = 'https://portal.packzy.com/api/v1/create_order';
        $api_key = '9cud28iwftofhcep9jb6fwrqkgzhmozn ';
        $secret_key = 'luehdpssclqgeswnvrqwdt1j ';


        $url = "https://portal.packzy.com/api/v1/status_by_trackingcode/$tracking_code";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Api-Key: ' . $api_key,
            'Secret-Key: ' . $secret_key
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);
        echo $data['delivery_status'];


    }
?>