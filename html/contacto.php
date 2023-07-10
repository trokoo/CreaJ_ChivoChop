<?php

    include('controladores.php');

    if(!isset($_SESSION['user']['id'])){
        header("location: index.php");
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>


    <link rel="stylesheet" href="../css/contact.css">

    <!--Conexion fuentes-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700;800;900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
 <!--Link Icon-->

    <link rel="icon" href="../img/logo.png" />
    
</head>
<body>



<!--Nav-->
<div class="contenedor_logo">
      <img src="../img/logo.png" width="90px" />
    </div>

    <div class="contenedor">
      <ul class="contenedor_ul">

      
       <h2 class="name">Bienvenid@ <?php if (true) {
        
       }echo $_SESSION["user"]["user"] ?></h2>

    

        <li class="etiqueta" id="chollon" onclick="showMenu()" >
        Tienda <img src="../img/flecha-hacia-abajo.png" alt="" class="efecto" id="chollon">
          <ul id="submenu" class="dropDown">
            <a href=""><li class="li_submenu">Camisas</li></a>
            <a href=""><li class="li_submenu">Accesorios</li></a>
            <a href=""><li class="li_submenu">Gorras</li></a>
            <a href=""><li class="li_submenu">Sivar</li></a>
          </ul>
        </li>

        <li><a href="">Sivar</a></li>
        <li><a href="">Contactanos</a></li>
        <li><a href="">Pago</a></li>
        <li><a href="close.php"> Cerrar sesion </a></li>
        <li class="imagen"><a href=""><img src="../img/lupa.png" alt=""  /></a></li>
        <li class="imagen"><a href="carrito.php"><img src="../img/carrito.png" alt=""  /></a></li>
       
      </ul>
    </div>
    <!--End Nav-->



    <div class="container">

        <form class="form">
            <br>
            <h2>Contactanos</h2>
            <p>
                <br>
                Puedes contactar con nosotros a través de este formulario, simplemente escribe los datos que se te solicitan en sus respectivos campos, y puedes informarnos sobre cualquier sugerencia, duda o queja que tu desees compartir con ChivoChop.
            </p>

            <label for="nombre">Escribe tu nombre</label>
            <input type="text" id="nombre" class="box">

            <label for="correo">Escribe tu correo</label>
            <input type="email" id="correo" class="box">

            <label for="mensaje">Escribe aqui</label>
            <textarea id="mensaje" cols="30" rows="10" class="box"></textarea>

            <input type="submit" value="Enviar" class="submit">

        </form>

        <div class="info">
            <img src="../img/logoW.png" class="img-1" alt="">
            <div class="icons">
                <img src="../img/gps-svgrepo-com.svg" alt="">
                <p>Buscanos en persona</p>
            </div>

            <div class="icons">
                <img src="../img/phone-svgrepo-com.svg" alt="">
                <p>Llamanos</p>
            </div>

            <div class="icons">
                <img src="../img/email-svgrepo-com.svg" alt="">
                <p>Contactanos por correo</p>
            </div>
        </div>
    </div>
    <a href="index.php"><img src="../img/atras.png" alt="" class="retroceder"></a>
</body>
<script>
  //Submenu
  const showMenu = () => {
    document.getElementById("submenu").classList.toggle("open")
  };
  document.addEventListener("click", function (E) {
    console.log(E.target)
    if (E.target.id == "chollon") return
    document.getElementById("submenu").classList.remove("open")
  });
</script>
</html>