<?php //Pagina para facilitar la conectividad de base de dato

const SERVIDOR = "localhost";
const USER = "root";
const PASSWORD = "";
const BD = "bd_app";
$connection = mysqli_connect(SERVIDOR, USER, PASSWORD, BD);