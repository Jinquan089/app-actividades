<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrarse</title>
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
    <form action="../php/registrar.php" method="post">
        <h1 style="margin-top: -15%;"> Página de Registro </h1><br>
        <div class="form group">
              <label for="exampleInputEmail1"><b>Usuario</b></label>
              <input type="text" name="user" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Escribe un usuario..." required>
              <br>
            <label for="exampleInputPassword1"><b>Contraseña</b></label>
            <input type="password" name="pwd1" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Escribe tu contraseña..." required>
            <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu contraseña con nadie.</small><br>
            <br>
            <label for="exampleInputEmail1"><b>Repetir contraseña</b></label>
            <input type="password" name="pwd2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Confirma tu contraseña..." required>
           <br><a href="../regis-login/login.php">¿Ya estás registrado? Clica aquí para loguearte.</a>
           <br>
           <br>
           <a href="../index.php"><b>Volver a la página web</b></a>
           <br><br>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </form>
    </div>
    <?php
    if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true') {
        echo "<div style='color:red'><b>Has puesto mal la contraseña</b></div>";
    }
    ?>
</body>
</html>