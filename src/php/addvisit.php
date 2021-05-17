<?php
    // adding a new visit to the local database
    session_start();
    $id = $_SESSION["id"];

    $date = $_GET["date"];
    $time = $_GET["time"];
    $duration = $_GET["duration"];
    $x = $_GET["x"];
    $y = $_GET["y"];

    function addToDatabase($id, $date, $time, $duration, $x, $y) {
        if (($conn = mysqli_connect("localhost", "mainUser", "WebDev2021", "webdev", "3306")) === false)
            die(mysqli_connect_error());

        $sql = "INSERT INTO Visits (id, date, time, duration, x, y) VALUES ('" . $id . "', '" . $date . "', '" . $time . "', '" . $duration . "', '" . $x . "', '" . $y . "')";

        if (mysqli_query($conn, $sql) === false) {
            die("Error " . $sql);
        }
    }

    addToDatabase($id, $date, $time, $duration, $x, $y);
    // calling visit.html
    header("Location: ../visit.html");
    exit();
?>