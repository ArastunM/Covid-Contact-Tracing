<?php
    // adding a new infection report to the database
    session_start();
    $id = $_SESSION["id"];

    $date = $_GET["date"];
    $time = $_GET["time"];

    if (($conn = mysqli_connect("localhost", "mainUser", "WebDev2021", "webdev", "3306")) === false)
        die(mysqli_connect_error());

    $sql = "INSERT INTO Infections (id, date, time) VALUES ('" . $id . "', '" . $date . "', '" . $time . "')";

    if (mysqli_query($conn, $sql) === false) {
        die("Error " . $sql);
    }
?>