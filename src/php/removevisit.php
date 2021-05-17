<?php
    // used to remove local user visits from the database
    session_start();
    $id = $_SESSION["id"];
    $rowId = $_GET["id"];

    if (($conn = mysqli_connect("localhost", "mainUser", "WebDev2021", "webdev", "3306")) === false)
            die(mysqli_connect_error());

    $sql = "SELECT id, date, time, duration, x, y FROM Visits WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);

    // finding the row to remove based on given row id
    if (mysqli_num_rows($result) > 0) {
        $count = 0;
        while($row = mysqli_fetch_assoc($result)) {
            if ($count == $rowId) {
                $toRemove = $row;
            }
            $count++;
        }
    }

    $id = $toRemove["id"];
    $date = $toRemove["date"];
    $time = $toRemove["time"];
    $duration = $toRemove["duration"];
    $x = $toRemove["x"];
    $y = $toRemove["y"];

    // removing the row with given details from the database
    $sql2 = "DELETE FROM Visits WHERE id = '$id' AND date = '$date' AND time = '$time' AND duration = '$duration' AND x = '$x' AND y = '$y'";

   if (mysqli_query($conn, $sql2) === false) {
            die("Error " . $sql2);
   }
?>