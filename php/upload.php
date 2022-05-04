<?php
$foto = $_FILES['foto'];
$des = $_POST['des'];

$path="\www\app-actividades\view\img";
$destino=$_SERVER['DOCUMENT_ROOT'].$path."/".$foto['name'];

$cantidad=(200*1024);
if (($foto['size']<$cantidad) && ($foto['type']=="image/jpeg" || $foto['type']=="image/png" || $foto['type']=="image/gif")) {
    $exito=move_uploaded_file($foto['tmp_name'], $destino);
    if ($exito) {
        $sql = "UPDATE `tbl_userlogin` SET `foto` = '$foto[name]', `descripcion`='$des' WHERE `id` = $id";
        $insert = mysqli_query($connection, $sql);
    }
} else {
    header('Location: ./principal.php');
}

