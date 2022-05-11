<?php
session_start();
include '../php/connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <!-- Hoja de estilos -->
    <link rel="stylesheet" href="../css/main.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">#AppName</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 50vh;">
                    <li class="nav-item">
                        <a class="nav-link" href="./nosotros.php">Sobre nosotros</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active disabled" aria-current="page" href="./actividades.php">Actividades</a>
                    </li>
                </ul>
                <?php
                if (!empty($_SESSION['user'])) {
                    ?>
                    <form class="d-flex" method="POST" action="./subir.actividades.php?<?php echo $_SESSION['user']; ?>" enctype="multipart/form-data">
                    <button class="btn btn-light form-control me-1" type="submit"><i class="fa-solid fa-arrow-up-from-bracket"></i></button>
                    </form>
                    <form class="d-flex" method="POST" action="../php/cerrarsession.php" enctype="multipart/form-data">
                    <button class="btn btn-light form-control ms-1" type="submit">Logout</button>
                    </form>
                    <form class="d-flex" method="POST" action="./mis.actividades.php?<?php echo $_SESSION['user']; ?>" enctype="multipart/form-data">
                    <button class="btn btn-light form-control ms-1" type="submit">Mis actividades</button>
                    </form>
                <?php
                } else {
                    echo '<form class="d-flex" action="../regis-login/login.php" method="POST" enctype="multipart/form-data">';
                    echo '<button class="btn btn-light form-control me-1" type="submit"><i class="fa-solid fa-arrow-up-from-bracket"></i></button>';
                    echo '<button class="btn btn-light form-control ms-1" type="submit">Acceder</button>';
                    echo '</form>';
                }
                ?>
<!--<form class="d-flex" action="../regis-login/login.php" method="POST" enctype="multipart/form-data">
<button class="btn btn-light form-control me-1" type="submit"><i
class="fa-solid fa-arrow-up-from-bracket"></i></button>
<button class="btn btn-light form-control ms-1" type="submit">Acceder</button></form>-->
            </div>
        </div>
    </nav>
    <!-- Top -->
    <div class="row-c padding-m">
        <h4 class="column-1 padding-m">Top 5</h4>

        <div class="column-1 padding-s imap">
            <?php
            $sql = "SELECT * FROM `tbl_foto` ORDER BY likes desc LIMIT 5";
            $select = mysqli_query($connection, $sql);
            $ruta = $_SERVER['SERVER_NAME']."/www/app-actividades/img/";
            foreach ($select as $foto) {
                $rutacompleta="https://".$ruta.$foto['foto_user'];
            echo'<div class="column-5 padding-s">';
            echo    "<img src='{$rutacompleta}' class='target imgp'>";
            echo'</div>';
            }

            ?>
        </div>

    </div>

    <!-- listado de actividades -->
    <div class="row-c">
        <div class="column-1 padding-m">
            <h4 class="padding-m">Explora</h4>
        </div>
        <div>
            
            <div>
            <?php
            if (!empty($_SESSION['user'])) {
                $sql = "SELECT * FROM tbl_foto";
                $foto = mysqli_query($connection, $sql);
                $ruta = $_SERVER['SERVER_NAME']."/www/app-actividades/img/";
                foreach ($foto as $list) {
                $id=$list['id'];
                ?>
                <a href="detaimg.php?id=<?php echo $id ?>">
                <div class="column-3 padding-mobile">
                <?php
                $rutacompleta="https://".$ruta.$list['foto_user'];
                echo    "<img src='{$rutacompleta}' class='target'>";
                echo     '<div style="float: right;" class="padding-m">';
                echo    '</a>';
                ?>
            <?php
                $idpost = $list['id'];
                $user2 = $_SESSION['user'];
                $sqllook = mysqli_query($connection,"SELECT id FROM tbl_userlogin WHERE user_login = '$user2'");
                $us = mysqli_fetch_array($sqllook);
                $user3 = $us['id'];
                $sql = "SELECT * FROM tbl_megusta WHERE foto_me = '$idpost' AND user = '$user3'";
                $query = mysqli_query($connection, $sql);
                
                if (mysqli_num_rows($query) == 0) { ?>
                    <button class="btn btn-light m-1" type="submit"><i class="fa-solid fa-link"></i></button>
                    <button class="btn btn-light m-1 like" onclick="like(<?php echo $list['id'] ?>)" type="submit" id="<?php echo $list['id'] ?>"><i class="fa-solid fa-heart"></i> Me gusta</button>
                    <span id="likes_<?php echo $list['id']; ?>">(<?php echo $list['likes']; ?>)</span>
                <?php
                } else { ?>
                    <button class="btn btn-light m-1" type="submit"><i class="fa-solid fa-link"></i></button>
                    <button class="btn btn-light m-1 like" onclick="like(<?php echo $list['id'] ?>)" type="submit" id="<?php echo $list['id'] ?>"><i class="fa-solid fa-heart"></i> No me gusta</button>
                    <span id="likes_<?php echo $list['id']; ?>">(<?php echo $list['likes']; ?>)</span>
                    <?php
                }
            echo '</div>';
            echo '</div>';
            
            }
         } else {
            $sql = "SELECT * FROM tbl_foto";
            $foto = mysqli_query($connection, $sql);
            $ruta = $_SERVER['SERVER_NAME']."/www/app-actividades/img/";
            foreach ($foto as $list) {
            echo'<div class="column-3 padding-mobile">';
                    $rutacompleta="https://".$ruta.$list['foto_user'];
            echo    "<img src='{$rutacompleta}' class='target'>";
            echo    '<div style="float: right;" class="padding-m">';
            echo        '<form action="../regis-login/login.php">';
            echo            '<button class="btn btn-light m-1" type="submit"><i class="fa-solid fa-link"></i></button>';
            echo            '<button class="btn btn-light m-1" type="submit"><i class="fa-solid fa-heart"></i></button>';
            echo        '</form>';
            echo    '</div>';
            echo '</div>';
            }
         }
            ?>
    </div>
   
</body>
<script>
    function like(id) {
        var url = '../php/megusta.php'
            $.ajax({
                type: "POST", //Forma de enviar los datos
                data: {id:id}, //Datos que vas a enviar el id primero es la variable de arriba y el id segundo es el id del boton
                url:url, // url la pagina donde vas a enviar los datos
                dataType: 'json', // Tipo de dato en js
                success:function(data){ //Si funciona el ajax coje los datos que nos enviar el php
                    var likes = data['likes']; //cojemos los y lo ponemos en una variable
                    var text = data['text'];
                    $('#likes_'+id).html(likes); //Aqui ponemos por pantalla los datos
                    $('#'+id).html(text);
                    
                    
                }
            })
    }

</script>
</html>