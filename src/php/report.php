<?php
    // reporting an infection (all of the local user visits) to the external web service
    // constructing the report to be sent
    $content->x = (int)$_GET["x"];
    $content->y = (int)$_GET["y"];
    $content->date = $_GET["date"];
    $content->time = $_GET["time"];
    $content->duration = (int)$_GET["duration"];
    echo json_encode($content);

    if (($handle = curl_init()) === false) {
        echo "Curl-Error" . curl_error($handle);
    } else {
        curl_setopt($handle, CURLOPT_FAILONERROR, true);
        $url = "http://ml-lab-7b3a1aae-e63e-46ec-90c4-4e430b434198.ukwest.cloudapp.azure.com:60999/ctracker/report.php";
        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_POST, true);
        curl_setopt($handle, CURLOPT_HTTPHEADER, array("Content-type: application/json"));

        // defining the Post
        $post = json_encode($content);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $post);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($handle);
        $curl_close($handle);

        if ($server_output == "200") {
            echo "success";
        }
        else {
            echo "fail";
        }
    }
?>