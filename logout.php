<?php


    //log user out and jump to login page
    session_start();
    session_unset();
    session_destroy();
    header("location: login.php");


?>