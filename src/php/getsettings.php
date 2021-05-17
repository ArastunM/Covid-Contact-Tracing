<?php
    // used to obtain setting details of the current user
    session_start();
    $id = $_SESSION["id"];

    if (($conn = mysqli_connect("localhost", "mainUser", "WebDev2021", "webdev", "3306")) === false)
            die(mysqli_connect_error());

    $sql = "SELECT window, distance FROM UserInfo WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo $row["window"] . "*" . $row["distance"];
        }
    }
    else {
        echo "";
    }
?>