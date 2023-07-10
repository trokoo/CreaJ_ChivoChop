<?php 


include('controladores.php');
session_start();




?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--Link css-->

    <link rel="stylesheet" href="../css/style.css" />
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

    <!--Nav-->
    <div class="contenedor_logo">
      <img src="../img/logo.png" width="90px" />
    </div>

    <div class="contenedor">
      <ul class="contenedor_ul">


      <?php if (($_SESSION)) :?>


      
       <h2 class="name">Bienvenid@ <?php if (true) {
        
       }echo $_SESSION["user"]["user"] ?></h2>

      <?php else:?>
      <?php endif?>
      


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
        <li><a href="contacto.php">Contactanos</a></li>
        <li><a href="">Pago</a></li>
        <?php if (($_SESSION)) :?>
        <li><a href="close.php"> Cerrar sesion </a></li>
        <?php else:?>
        <li><a href="registro.php">Registrarse</a></li>
        <?php endif?>
        <li class="imagen"><a href=""><img src="../img/lupa.png" alt=""  /></a></li>
        <li class="imagen"><a href="carrito.php"><img src="../img/carrito.png" alt=""  /></a></li>
       
      </ul>
    </div>
    <!--End Nav-->

    <!--Bienvenida-->

    <div class="home">
        <h1>ChivoChop</h1> 
        <h3>Porque comprar es chivo</h3>
        <a href="#ancla"><img src="../img/down_grande.png" alt="" class="down"></a>
    </div>

    <!--End Bienvenida-->

     <!--Inicio de ventas-->

     <?php if (($_SESSION)) :?>

      
     <h1 class="products" id="ancla">Productos Destacados</h1>

      <div class="container-card">
        <?php
        $productos = "SELECT * FROM productos";
        $run = mysqli_query($connex, $productos);
        while ($fetch = mysqli_fetch_array($run)){
        ?>   
            <div class="card">
            <div class="contenido-card">
            <figure>
              <?php echo '<img src="../img/'.$fetch["img"].'">' ?>
            </figure>
              <h3><?php echo $fetch['nombre'] ?></h3>
              <p>$<?php echo $fetch['precio'] ?></p>
              <a class="" href="item.php?id=<?php echo $fetch['id'] ?>">Agregar al carrito</a><!-- envia la id a la pagina de item.php-->
            </div>
          </div>
        <?php
        }
        ?>
      </div>
      
      <?php else:?>
    
        <h1 class="products" id="ancla">Productos Destacados</h1>

      <div class="container-card">
        <?php
        $productos = "SELECT * FROM productos";
        $run = mysqli_query($connex, $productos);
        while ($fetch = mysqli_fetch_array($run)){
        ?>   
            <div class="card">
            <div class="contenido-card">
            <figure>
              <?php echo '<img src="../img/'.$fetch["img"].'">' ?>
            </figure>
              <h3><?php echo $fetch['nombre'] ?></h3>
              <p>$<?php echo $fetch['precio'] ?></p>
              <a class="" href="registro.php?id=<?php echo $fetch['id'] ?>">Agregar al carrito</a><!-- envia la id a la pagina de registro.php-->
            </div>
          </div>
        <?php
        }
        ?>
      </div>

      <?php endif?>
     <!--Fin de ventas-->

      <!--Footer-->
     <footer>

      <img src="../img/logo.png" alt="" class="logo">
      <div class="social-icons-container">
        <a href="" class="social-icon"></a>
        <a href="" class="social-icon"></a>
        <a href="" class="social-icon"></a>
        <a href="" class="social-icon"></a>
      </div>
    
      <span class="copyright">&copy;2023 ChivoChop - Todos los derechos reservados</span>
    
    
    </footer>

    <!--End Footer-->

  </body>
  <script>
    //Submenu
    const showMenu = () => {
        document.getElementById("submenu").classList.toggle("open")
    };
    document.addEventListener("click", function(E){
      console.log(E.target)
      if(E.target.id == "chollon") return
      document.getElementById("submenu").classList.remove("open")
    });
  </script>
</html>
