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
    <title>Sobre nosotros</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
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
                        <a class="nav-link active disabled" aria-current="page" href="#">Sobre nosotros</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./actividades.php">Actividades</a>
                    </li>
                </ul>
                <?php
                if (!empty($_SESSION['user'])) {
                    ?>
                    <form class="d-flex" method="POST" action="./subir.actividades.php?<?php echo $_SESSION['user']; ?>" enctype="multipart/form-data">
                    <button class="btn btn-light form-control me-1" type="submit"><i class="fa-solid fa-arrow-up-from-bracket"></i></button>
                    </form>
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
    <!-- Topics -->

    <div class="row-c padding-m">
        <div class="column-66 padding-m padding-right">
            <h5>Topics</h5>
            <button type="button" class="btn btn-primary mt-1">matemáticas</button>
            <button type="button" class="btn btn-info mt-1">informática</button>
            <button type="button" class="btn btn-dark mt-1">...</button>
        </div>
    </div>

    <!-- Intro -->
    <header class="text-white flex padding-l">
        <h1><strong>#AppName</strong></h1>
    </header>
    <div class="row-c padding-m">
        <div class="column-1 padding-m">
            <h5>Navega</h5>
        </div>
        <div class="column-66 padding-m padding-right">
            <!-- <h2><strong>#AppName</strong> es un club para explorar, desarrollar y compartir nuestra creatividad natural</h2> -->
            <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore, corporis ipsa. Non, exercitationem! Vel enim exercitationem dolores, incidunt, molestias praesentium magnam cumque nostrum aperiam ducimus tempore? Fugit placeat debitis asperiores.</h4>
        </div>
    </div>

    <!-- Random de actividades -->

    <div class="row-c padding-m">
        <div class="column-1 padding-m">
            <h5>Subidas recientemente</h5>
        </div>

        <div class="column-1 padding-s">
        <?php
                    $sql = "SELECT * FROM `tbl_foto` ORDER BY fecha_su desc LIMIT 4";
                    $select = mysqli_query($connection, $sql);
                    $ruta = $_SERVER['SERVER_NAME']."/www/app-actividades/img/";
                    foreach ($select as $foto) {
                        $rutacompleta="https://".$ruta.$foto['foto_user'];
                    echo'<div class="column-4 padding-s">';
                    echo    "<img src='{$rutacompleta}' class='target-s'>";
                    echo'</div>';
                    }
        ?>
        </div>
    </div>

</body>

</html>