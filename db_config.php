<?php
define("HOST","localhost");
define("USER","root");
define("PASSWORD","");
define("DATABASE","wp");

$connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

if(mysqli_connect_errno())
    echo "Failed to connect to MySQL: " . mysqli_connect_error(); //hogyha van hiba, kiirja

/* mysqli_query($connection,"SET NAMES utf8") or die (mysqli_connect_error($connection));
mysqli_query($connection,"SET CHARSET SET utf8") or die (mysqli_connect_error($connection));
mysqli_query($connection,"SET COLLACTION_CONNECT='utf8_general_ci'") or die (mysqli_connect_error($connection)); */
?>