<?php
    $host = "localhost:3306";
    $user = "root";
<<<<<<< HEAD
    $password = "200426";
=======
    $password = "123456789";
>>>>>>> bcf8befb0248a995ba9a8c9172323039de014a14
    $database = "car_breezy";
    $mysqli = new mysqli($host, $user, $password, $database);

    if ($mysqli -> connect_error){
        die("Connection failed: " . $mysqli -> connect_error);
    }
    $mysqli->set_charset("utf8mb4");
?>