<?php
    include_once("conexion.php");
    session_start();


    if(isset($_SESSION['usuario'])){
        header('Location: index.html');
    }

    if(isset($_POST['usuario'])){

        $sql = "SELECT * FROM usuarios WHERE nombre='" . $_POST['usuario'] . "' AND clave='". $_POST['clave'] ."' LIMIT 1";
        $result = mysqli_query($conexion,$sql);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['usuario'] = $_POST['usuario'];
            header('Location: index.html&name=' . $_POST['usuario']);
            exit();
        } else {
		echo $_POST['usuario'] . " no es valido";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat:300,400,700"rel="stylesheet'>
    <link rel="stylesheet" href="css/login.css">
</head>

<body style="min-height:300px">
  <div class="formulario">

    <img src="images/logoGTI.svg" alt="LogoGTI" class="imagenLogo">

    <form action="#" method="post">

      <a href="index.html">
        <img src="images/back.svg" alt="back" class="back">
      </a>
      <h1 class="iniciarSesion"> Iniciar sesión </h1>

      <div class="div_formulario">
        <!--<label class="usuario" for="name">Usuario</label><br>-->
        <p />
        <input name="usuario" type="text" required placeholder="Introducir nombre de usuario">

        <!--<label class="contraseña" for="password">Contraseña</label><br>-->
        <p />
	<input name="clave" type="password" required placeholder="Introducir contraseña">
      </div>
      <br>
      <div class="div_boton">
        <input type="submit" value="Iniciar sesión" class="boton">
      </div>
      <br>
      <div class="div_registrar">
        <a href="#" onclick="saberMas()" class="registrar">¿No tienes cuenta?</a>
        <div class="saberMas-popup" id="popup">
          <span class="registrar">Obtén una cuenta</span>
          <img src="images/close.svg" alt="close" class="cross-popup" onclick="saberMas()">
          <br>
          <p class="info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia nostrum porro, quos deleniti odit, ratione sequi magnam sit tenetur voluptates repudiandae similique iusto veritatis delectus ab est nesciunt ad nemo.</p>
          <a href="#">Saber más</a>
        </div>
      </div>

    </form>
  </div>

  <script>
    var showing = false;

    function saberMas() {
      if (!showing) {
        document.getElementById("popup").style.opacity = 1;
        showing = true;
      } else {
        document.getElementById("popup").style.opacity = 0;
        showing = false
      }
    }
  </script>

  </div>
</body>

</html>
