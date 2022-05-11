<?php //Logica de php para iniciar session
session_start();
$user=$_POST['user']; //Variable user
$pwd=$_POST['pwd']; //Variable Passowrd
include 'connection.php'; //Base de datos
$select = "SELECT * FROM tbl_userlogin where user_login = '$user'"; //Seleccion de user y password dentro de base de datos
$sele= mysqli_query($connection, $select);
$seleF = mysqli_fetch_array($sele);

if ($seleF['user_login'] == $user && $seleF['password_login'] == $pwd) { //Si son iguales ha iniciado session
    $_SESSION['user']=$user;
    header('Location: ../index.php');
} else { // Si no le redirijo para login
    header('Location: ../regis-login/login.php?fallo=true');
}




