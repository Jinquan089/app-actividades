<?php //Logica de registrar
//Valibles de user y password
$user=$_POST['user'];
$pwd1=$_POST['pwd1'];
$pwd2=$_POST['pwd2'];
include 'connection.php';
$select = "SELECT user_login FROM tbl_userlogin WHERE user_login = '".$user."'";
$sele= mysqli_query($connection, $select);
$seleF = mysqli_num_rows($sele);
//Arriba miro si hay igual o no y abajo con la funcion if si hay le mando a registar otra vez y si el password no son igual tambien si no cumple los dos ya estara registrado
if ($seleF!=0) { 
    header('Location: ../regis-login/registrar.php?fallo=true');
} elseif ($pwd1!=$pwd2) {
    header('Location: ../regis-login/registrar.php?fallo=true2');
} else {
    $sql = "INSERT INTO tbl_userlogin (`user_login`, `password_login`) VALUES ('$user', $pwd1);";
    $insert = mysqli_query($connection, $sql);
    header('Location: ../regis-login/login.php');
}
?>