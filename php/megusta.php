<?php
session_start();
include 'connection.php';
$user2 = $_SESSION['user'];
$user = "SELECT id FROM tbl_userlogin WHERE user_login = '$user2'";
$sqllook = mysqli_query($connection,$user);
$us = mysqli_fetch_array($sqllook);
$user3 = $us['id'];
$id = $_POST['id'];
$sql = mysqli_query($connection, "SELECT * FROM tbl_megusta WHERE foto_me = '$id' AND user = '$user3'");
$comp = mysqli_num_rows($sql);
if ($comp == 0) {
    $insert = mysqli_query($connection, "INSERT INTO tbl_megusta (foto_me, user) VALUE ('$id','$user3')");
    $update = mysqli_query($connection, "UPDATE tbl_foto SET likes = likes+1 WHERE id = $id");
} else {
    $delete = mysqli_query($connection, "DELETE FROM tbl_megusta WHERE foto_me = '$id' AND user = '$user3'");
    $update = mysqli_query($connection, "UPDATE tbl_foto SET likes = likes-1 WHERE id = $id");
}

$contar = mysqli_query($connection, "SELECT likes FROM tbl_foto WHERE id = '$id'");
$cont = mysqli_fetch_array($contar);
$likes = $cont['likes'];

if ($comp >= 1 ) {
    $megusta = "<i class='fa-solid fa-heart'></i> Me gusta";
    $likes = "(".$likes++.")";
} else {
    $megusta = "<i class='fa-solid fa-heart'></i> No me gusta";
    $likes = "(".$likes--.")";
}

$datos = array('likes'=> $likes, 'text'=> $megusta);

echo json_encode($datos);

?>