<?php //subida de foto
session_start();
include 'connection.php';
//Cojemos las variables que nos manda por el formulario
$foto = $_FILES['foto'];
$des = $_POST['des'];
$titulo = $_POST['titulo'];
$select = "SELECT foto_user FROM tbl_foto WHERE foto_user = '".$foto['name']."'";
$look = mysqli_query($connection, $select);
$look1 = mysqli_num_rows($look);
// Como siempre miramos que no se repita el nombre
$path="\www\app-actividades\img"; //ruta
$destino=$_SERVER['DOCUMENT_ROOT'].$path."/".$foto['name']; //Combinamos todas las rutas con el nombre con el servidor
if ($look1 != 0) { //comprobamos
    header('Location: ../view/subir.actividades.php?fallo=true');
} elseif ($foto['name'] != null && $foto['type']=="image/jpeg" || $foto['type']=="image/png" || $foto['type']=="image/gif") { //aqui solo permitimos el jpg, png y gif
    $exito=move_uploaded_file($foto['tmp_name'], $destino); //mueve la foto a nuestra carpeta de img
    if ($exito) {
    $sql = "INSERT INTO tbl_foto (`foto_user`, `user_id`, `descripcion`, `titulo`) VALUES ('$foto[name]',(SELECT id FROM tbl_userlogin where user_login='$_SESSION[user]'), '$des', '$titulo')";
    $insert = mysqli_query($connection, $sql);
    header('Location: ../view/mis.actividades.php'); //lo subimos a nuestro base de datos
    }
} else {
    header('Location: ../view/subir.actividades.php?fallo=null');
}
