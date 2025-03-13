<?php
    $host = "localhost";
    $user = "root";
<<<<<<< HEAD
    $password = "12345678";
=======
    $password = "200426";
>>>>>>> 2292923b7131a814d12ce5d5c68876cbb613cdac
    $database = "car_breezy";

    $mysqli = new mysqli($host, $user, $password, $database);

    if ($mysqli -> connect_error){
        die("Connection failed: " . $mysqli -> connect_error);
    }
?>