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
    <title>Subir Foto</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
    <!-- Hoja de estilos -->
    <link rel="stylesheet" href="../css/main.css">
</head>

<body style="width: 100vw; height: 100vh;" class="backgroundsubir">
    <!-- Navbar -->
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
                        <a class="nav-link" aria-current="page" href="./actividades.php">Actividades</a>
                    </li>
                </ul>
                <?php
                if (!empty($_SESSION['user'])) {
                    ?>
                    <form class="d-flex" method="POST" action="./mis.actividades.php?<?php echo $_SESSION['user']; ?>" enctype="multipart/form-data">
                    <button class="btn btn-light form-control ms-1" type="submit">Mis actividades</button>
                    </form>
                    <form class="d-flex" method="POST" action="../php/cerrarsession.php" enctype="multipart/form-data">
                    <button class="btn btn-light form-control ms-1" type="submit">Logout</button>
                    </form>
                <?php
                } else {
                    echo '<form class="d-flex" action="../regis-login/login.php" method="POST" enctype="multipart/form-data">';
                    echo '<button class="btn btn-light form-control me-1" type="submit"><i class="fa-solid fa-arrow-up-from-bracket"></i></button>';
                    echo '<button class="btn btn-light form-control ms-1" type="submit">Acceder</button>';
                    echo '</form>';
                }
                ?>
            </div>
        </div>
    </nav>


    <div class="margintop-subir-actividades" style="-webkit-box-shadow: 5px 5px 8px 6px rgba(0,0,0,0.44); box-shadow: 5px 5px 8px 6px rgba(0,0,0,0.44);"> 
    <form action="../php/upload.php" method="POST" enctype="multipart/form-data">
    <input type="file" class="custom-file-upload subir-actividades-button margin-subir-actividades" name="foto"><br>
    <h1 style="margin-top: -15%;"> Subir Imágenes </h1><br> 
        <div class="form-group margin-subir-actividades">
            <label for="exampleInputEmail1"><b>Título</b></label>
            <br><input type="text" name="titulo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Inserta el título de la imagen">
        </div>
        <div class="form-group margin-subir-actividades">
            <label for="exampleInputPassword1"><b>Descripción</b></label>
            <input type="text" class="form-control" style="height: 300px;" name= "des" id="exampleInputPassword1" placeholder="Añade una pequeña descripción a tu imagen">
        </div>
        <button type="submit" class="btn btn-primary margin-subir-actividades">Enviar</button>
        <br>
    </div>
    </form>
    </div>

</body>

</html>