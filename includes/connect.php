<?php
    $host = "localhost";
    $user = "root";
    $password = "200426";
    $database = "car_breezy";
    $mysqli = new mysqli($host, $user, $password, $database);

    if ($mysqli -> connect_error){
        die("Connection failed: " . $mysqli -> connect_error);
    }
?>