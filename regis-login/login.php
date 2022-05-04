<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" media="all" href="../css/main.css" />
</head>
<body>
    <div class="bg"></div>
    <div class="bg bg2"></div>
    <div class="bg bg3"></div>
    <div class="content" style="-webkit-box-shadow: 5px 5px 8px 6px rgba(0,0,0,0.44); box-shadow: 5px 5px 8px 6px rgba(0,0,0,0.44);">
<div class="context">                                    
        <form action="../php/login.php" method="POST" enctype="multipart/form-data">
        <h1 style="margin-top: -15%;"> Página de Login </h1><br>
            <div class="form-group">
            <label for="exampleInputEmail1"><b>Usuario</b></label>
                <input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu usuario" required><br>
            <label for="exampleInputEmail1"><b>Contraseña</b></label>
                <input type="password" name="pwd" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Introduce tu contraseña..." required><br>
                <?php
                    if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true') {
                        echo "<div style='color:red'><p><b>User o contraseña incorrecta</b></p></div>";
                    }
                    ?>
                    <a href="./registrar.php">¿No estás logueado? Clica para registrarte</a><br>
                    <br>
                    <a href="../index.php"><b>Volver a la página web</b></a>
                <br><br>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>
    </div>
    </body>
</html>