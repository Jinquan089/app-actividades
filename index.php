<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>#AppName</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
    <!-- hoja de estilos -->
    <link rel="stylesheet" href="./css/main.css">

</head>

<body>
    <div class="hero">
        <main>
            <div class="title">
                <p>Disfruta de compartir 🚀</p>
                <p><strong>#AppName</strong> es una plataforma donde profesoras y profesores de todo el mundo pueden compartir actividades, pasar el rato y aprender unos con otros; colaborando en proyectos y compartiendo ideas crearemos juntos el futuro
                    de la educación
                </p>

                <a href="./view/nosotros.php "><button type="button " class="btn btn-success "><b><i class="fa-solid fa-chalkboard-user "></i> Sobre nosotros</b></button></a>
                <a href="./view/actividades.php "><button type="button " class="btn btn-warning "><i class="fa-solid fa-book-open-reader "><b></i> Actividades</b></button></a>
                <?php
                if (!empty($_SESSION['user'])) {
                    echo '<a href="./php/cerrarsession.php "><button type="button " class="btn btn-light "><b><i class="fa-solid fa-right-to-bracket "></i>Logout</b></button></a>';
                } else {
                    echo '<a href="./regis-login/login.php "><button type="button " class="btn btn-light "><b><i class="fa-solid fa-right-to-bracket "></i> Acceder</b></button></a>';
                    echo " ";
                    echo '<a href="./regis-login/registrar.php"><button type="button " class="btn btn-info "><b><i class="fa-solid fa-registered "></i> Registrar</b></button></a>';
                }
                ?>
                
                
            </div>
            <div class="cube "></div>
            <div class="cube "></div>
            <div class="cube "></div>
            <div class="cube "></div>
            <div class="cube "></div>
            <div class="cube "></div>
            <div class="cube "></div>
            <div class="cube "></div>
        </main>
    </div>

</body>

</html>