<?php
    // used to get local visits of the current user
    session_start();
    $id = $_SESSION["id"];

    if (($conn = mysqli_connect("localhost", "mainUser", "WebDev2021", "webdev", "3306")) === false)
            die(mysqli_connect_error());

    $sql = "SELECT date, time, duration, x, y FROM Visits
            WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo $row["date"] . "*" . $row["time"] . "*" . $row["duration"] . "*" . $row["x"] . "*" . $row["y"] . "&";
        }
    }
    else {
        echo "";
    }
?>