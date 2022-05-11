<?php //Pagina de AJAX
session_start();
include 'connection.php';
//Usuario Start: para cojer el ID del usuario
$user2 = $_SESSION['user'];
$user = "SELECT id FROM tbl_userlogin WHERE user_login = '$user2'";
$sqllook = mysqli_query($connection,$user);
$us = mysqli_fetch_array($sqllook);
$user3 = $us['id'];
//End
//Hago un select donde el id de la foto y de usuario sean igual
$id = $_POST['id'];
$sql = mysqli_query($connection, "SELECT * FROM tbl_megusta WHERE foto_me = '$id' AND user = '$user3'");
$comp = mysqli_num_rows($sql);
//Miro si el select tiene los mismos datos si no los tiene de devuelve un 0
if ($comp == 0) { //Si me da 0 inserto y le sumo 1 like
    $insert = mysqli_query($connection, "INSERT INTO tbl_megusta (foto_me, user) VALUE ('$id','$user3')");
    $update = mysqli_query($connection, "UPDATE tbl_foto SET likes = likes+1 WHERE id = $id");
} else { //Si no me da 0 quito el usuario que ha dado like y like -1
    $delete = mysqli_query($connection, "DELETE FROM tbl_megusta WHERE foto_me = '$id' AND user = '$user3'");
    $update = mysqli_query($connection, "UPDATE tbl_foto SET likes = likes-1 WHERE id = $id");
}
//Para sacar la cantidad de likes
$contar = mysqli_query($connection, "SELECT likes FROM tbl_foto WHERE id = '$id'");
$cont = mysqli_fetch_array($contar);
$likes = $cont['likes'];

//Si arriba no te da 0 el boton de likes sera Megusta
if ($comp >= 1 ) {
    $megusta = "<i class='fa-solid fa-heart'></i> Me gusta";
    $likes = "(".$likes++.")";
} else { //Si es 0 entonces sera no megusta para que cuando le des click se ponga a Me gusta
    $megusta = "<i class='fa-solid fa-heart'></i> No me gusta";
    $likes = "(".$likes--.")";
}
//Los meto en un array
$datos = array('likes'=> $likes, 'text'=> $megusta);
//Lo mando a la pagina donde se muestra con js
echo json_encode($datos);

?>