<?php
    // setting new settings for the current user
    session_start();
    // assigning new setting values to be set
    $id = $_SESSION["id"];
    $window = $_GET["window"];
    $distance = $_GET["distance"];

    if (($conn = mysqli_connect("localhost", "mainUser", "WebDev2021", "webdev", "3306")) === false)
            die(mysqli_connect_error());

    // updating the database with new setting values
    $sql = "UPDATE UserInfo SET window = '$window', distance = '$distance' WHERE id = '$id'";

    if (mysqli_query($conn, $sql) === false) {
            die("Error " . $sql);
   }

   // redirecting back to the home page
   header("Location: ../settings.html");
   exit();
?>