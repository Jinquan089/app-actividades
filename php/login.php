<?php
session_start();
$user=$_POST['user'];
$pwd=$_POST['pwd'];
include 'connection.php';
$select = "SELECT * FROM tbl_userlogin where user_login = '$user'";
$sele= mysqli_query($connection, $select);
$seleF = mysqli_fetch_array($sele);

if ($seleF['user_login'] == $user && $seleF['password_login'] == $pwd) {
    $_SESSION['user']=$user;
    header('Location: ../index.php');
} else {
    header('Location: ../regis-login/login.php?fallo=true');
}




