<!DOCTYPE html>
<html>
 <head>
 <title>Proyecto IoT</title>
 <link rel="stylesheet" href="indexp.css">
 </head>
 <body>
 <?php
 if(isset($_POST['enviar'])){
 $login = $_POST['login'];
 $password = $_POST['pass'];
 if ($login=="admin" && $password=="1234"){
 header("Location: seleccion.html");
 }
 else{
 header("Location: index.php");
 }
 }
 else{
 ?>
 <br>

 <section class="contenedor-login">
        <h2>Iniciar sesión</h2>   
        <form action="index.php" method="POST">        
        <input type="text" name="login" placeholder="Ingrese su nombre de usuario"> 
        <input type="password" name="pass" placeholder="Ingrese su contraseña"> 
        <input type="submit" name="enviar" class="botonEnviar" value="ENVIAR">
        </form>
        <?php } ?>
        </section>
 </body>
</html>