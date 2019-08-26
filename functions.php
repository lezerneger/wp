<?php
require 'db_config.php';

/**
 * Function check that user exists in users table
 *
 * @param $email
 * @param string $password
 * @return bool
 * @internal param $username
 * @internal param string $user
 */

function check_login_user($user,$password)
{
    global $connection;
    $id_user = false;

    $sql = "SELECT id FROM users WHERE user = '$user' AND password = MD5('$password')";

    $result = mysqli_query($connection,$sql) or die(mysqli_error($connection));

    if (mysqli_num_rows($result)>0) {
        while($record = mysqli_fetch_array($result,MYSQLI_ASSOC))
            $id_user = $record['id'];
    }

    login_log($user, $password, $id_user);
    return $id_user;
}

/**
 * Function redirects user to one page
 *
 * @param integer $l
 */
function error_redirection($l)
{
    header("Location:admin.php?l=$l");
    exit();
}

function success_redirection() {
    header("Location:logged_admin.php");
    exit();
}

 function login_log($user, $password, $id_user) {
    global $connection;
    $insertData = mysqli_real_escape_string($connection, "ip: " . $_SERVER['REMOTE_ADDR'] .", user:" . $user . ", password: " . $password . ", id: " .$id_user);
    $sql = "INSERT INTO log (`data`) VALUES ('$insertData')";

    $result = mysqli_query($connection,$sql) or die(mysqli_error($connection));
} 