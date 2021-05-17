<?php
    // used when logging in
    // getting filled input values
    $givenUsername = $_GET["username"];
    $givenPassword = $_GET["password"];

    // connecting to the database
    if (($conn = mysqli_connect("localhost", "mainUser", "WebDev2021", "webdev", "3306")) === false)
            die(mysqli_connect_error());

    $sql = "SELECT id, name, username, password FROM UserInfo
            WHERE username = '$givenUsername'";

    $result = mysqli_query($conn, $sql);

    // checking if username same as given username input exists
    if (mysqli_num_rows($result !== 1)) {
        // username does not exist
        header("Location: ../login.html");
        exit();
    }

    $user = mysqli_fetch_row($result);
    // verifying hashed password
    if (password_verify($givenPassword, $user[3])) {
        session_start();
        $_SESSION["id"] = $user[0];
        $_SESSION["name"] = $user[1];

        header("Location: ../home.html");
        exit();

    }
    else {
        // login password is incorrect
        header("Location: ../login.html");
        exit();
    }
?>