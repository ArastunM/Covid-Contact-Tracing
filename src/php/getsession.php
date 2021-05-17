<?php
    // used to obtain current session values
    session_start();

    if(!isset($_SESSION["id"])) {
        // "" return if session is not set
        echo "";
    } else {
        echo $_SESSION["name"] . "<br>" . $_SESSION["id"];
    }
?>