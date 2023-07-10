<?php 
include('controladores.php');
if (isset($_SESSION["user"])) {
  if ($_SESSION["user"]["rol"] == "user") {
    header('Location: index.php');
  }else{
    header('Location: admin.php');
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

     <!--Link css-->

     <link rel="stylesheet" href="../css/reg.css" />
     <link rel="stylesheet" href="../css/hover.css" />
 
     <!--Conexion fuentes-->
 
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
     
     <!--Link Icon-->
 
     <link rel="icon" href="../img/logo.png" />
     <title>ChivoChop</title>
   </head>
 
   <body>

     <!--Log-->

    <div class="container">    


        <div class="aside2">
            <h1>Estas a punto de volvete un torogoz</h1>
     </div>

        <div class="formulario">
           
     <form action="#" class="formulario form" method="post">
        <h1>Inicio de sesion</h1>
        <img src="../img/logo.png" alt="">
       
        <input type="email" placeholder="Email" name="email" required >
        <input type="password" placeholder="Password" name="pass" required> 
        <input type="submit" name="login" value="Enviar" id="form_button" />

        <a href="../html/registro.php">¿Aun no tienes una cuenta?</a>
        
     </form>
    </div>


</div>
     <!--End log-->


</body>

</html>