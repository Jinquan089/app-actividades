<?php
session_start();
include 'connection.php';
$foto = $_FILES['foto'];
$des = $_POST['des'];
$titulo = $_POST['titulo'];
$select = "SELECT foto_user FROM tbl_foto WHERE foto_user = '".$foto['name']."'";
$look = mysqli_query($connection, $select);
$look1 = mysqli_num_rows($look);
$path="\www\app-actividades\img";
$destino=$_SERVER['DOCUMENT_ROOT'].$path."/".$foto['name'];
echo "$look1";
if ($look1 != 0) {
    header('Location: ../view/subir.actividades.php?fallo=true');
} elseif ($foto['name'] != null && $foto['type']=="image/jpeg" || $foto['type']=="image/png" || $foto['type']=="image/gif") {
    $exito=move_uploaded_file($foto['tmp_name'], $destino);
    if ($exito) {
    $sql = "INSERT INTO tbl_foto (`foto_user`, `user_id`, `descripcion`, `titulo`) VALUES ('$foto[name]',(SELECT id FROM tbl_userlogin where user_login='$_SESSION[user]'), '$des', '$titulo')";
    $insert = mysqli_query($connection, $sql);
    header('Location: ../view/mis.actividades.php');
    }
} else {
    header('Location: ../view/subir.actividades.php?fallo=null');
}
