<?php
session_start();
require 'functions.php';

$user = $_POST['user'];
$password = $_POST['password'];

$userId = check_login_user($user, $password);

if($userId) {
    $_SESSION['id_user'] = $userId;
    $_SESSION['user'] = $user;
    header("location:logged_admin.php");
    exit();
}

error_redirection(1);