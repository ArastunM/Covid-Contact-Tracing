<?php
    // used when logging out of the system
    session_start();
    session_unset();
    session_destroy();
    session_write_close();

    // sleep to ensure session is properly destroyed before calling login.html
    sleep(1);
    header("Location: ../login.html");
    exit();
?>