<?php

    ob_start();

    $timezone = date_default_timezone_set("Europe/Stockholm");

    $conn = mysqli_connect('localhost', 'root', '', 'slotify');

    if(mysqli_connect_errno()){
        echo "Failed to connect: " . mysqli_connect_error();
    }

?>