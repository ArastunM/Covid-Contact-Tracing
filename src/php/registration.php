<?php
    // used for registration
    // getting filled input values
    $name = $_GET["name"];
    $surname = $_GET["surname"];
    $username = $_GET["username"];
    $password = $_GET["password"];
    $content = array($name, $surname, $username, $password);

    // checks the password criteria
    function passwordAppropriate($string) {
        if (strlen($string) >= 8) {
            if (!preg_match('/[\'^$%&*()}{@#~?><>,|=_+-]/', $string)) {
                return true;
            }
        } return false;
    }

    // adds details to the Database
    function addToDatabase($name, $surname, $username, $password) {
        if (($conn = mysqli_connect("localhost", "mainUser", "WebDev2021", "webdev", "3306")) === false)
            die(mysqli_connect_error());

        $sql = "INSERT INTO UserInfo (name, surname, username, password) VALUES ('" . $name . "', '" . $surname . "', '" . $username . "', '" . $password . "')";

        if (mysqli_query($conn, $sql) === false) {
            die("Error " . $sql);
        }
    }

    if (passwordAppropriate($password)) {
        // hashing the user password with cost 12
        $options = ['cost' => 12];
        $password = password_hash($password, PASSWORD_BCRYPT, $options);
        // adding provided user credentials to the database
        addToDatabase($name, $surname, $username, $password);

        // calling the login page
        header("Location: ../login.html");
        exit();

    } else {
        // registration unsuccessful redirecting back to registration page
        header("Location: ../registration.html");
        exit();
    }
?>