<?php
    // used to obtain infections from the external web service within given window
    $window = $_GET["window"];
    $url = "ml-lab-7b3a1aae-e63e-46ec-90c4-4e430b434198.ukwest.cloudapp.azure.com:60999/ctracker/infections.php?ts=" . $window;

    $handle = curl_init();
    curl_setopt($handle, CURLOPT_URL, $url);
    curl_setopt($handle, CURLOPT_HTTPGET, true);
    curl_setopt($handle, CURLOPT_HEADER, false);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

    if (($output = curl_exec($handle)) !== false) {
        echo $output;
    } else {
        echo "Curl-Error" . curl_error($handle);
    }
?>