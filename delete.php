<?php
include("db_config.php");
var_dump($_POST['delete']);
if(isset($_POST['delete']))
{
    $torles = $_POST['delete'];

    $sql = "DELETE FROM termekek WHERE id =".$torles;
    $myData = mysqli_query($connection, $sql);
    if($myData)
    {
        echo "Sikeres torles!";
        header("refresh:2; url=logged_admin.php");
    }
}