<?php //Detalles de foto
session_start();
include '../php/connection.php';
$id=$_GET['id'];

$sql= "SELECT * FROM tbl_foto";
$select = mysqli_query($connection,$sql);
$ruta = $_SERVER['SERVER_NAME']."/www/app-actividades/img/";
foreach ($select as $foto) {
    if ($foto['id']==$id) {
        echo "<h1>".$foto['titulo']."</h1>";
        $rutacompleta="https://".$ruta.$foto['foto_user'];
        echo    "<img src='{$rutacompleta}' class='target imgp'>";
        echo "<h1>".$foto['descripcion']."</h1>";
        
    }
}