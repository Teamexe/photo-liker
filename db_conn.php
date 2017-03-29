<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "mpsk22";
$dbname = "photo_liker";

$con = mysqli_connect("$dbhost","$dbuser","$dbpass","$dbname") or die("Some error occurred during connection " . mysqli_error($con));  


?>