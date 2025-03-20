<?php
    $host = "localhost";
    $user = "root";
<<<<<<< HEAD
    $password = "200426";
=======
    $password = "2004";
>>>>>>> 3e50ff3897787bc1a3659b38fccef31b5d253973
    $database = "car_breezy";
    $mysqli = new mysqli($host, $user, $password, $database);

    if ($mysqli -> connect_error){
        die("Connection failed: " . $mysqli -> connect_error);
    }
?>