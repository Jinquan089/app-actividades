<?php //pagina cuando le dan click a logout y cierra session
session_start();
session_destroy();
header('Location: ../index.php');