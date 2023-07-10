<?php 
  include('controladores.php');

  $precioTotal = 0;




  
  if(!isset($_SESSION['user']['id'])){
    header("location: index.php");
}


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
        <li class="etiqueta" id="chollon" onclick="showMenu()" >
        Tienda <img src="../img/flecha-hacia-abajo.png" alt="" class="efecto" id="chollon">
          <ul id="submenu" class="dropDown">
            <a href=""><li class="li_submenu">Camisas</li></a>
            <a href=""><li class="li_submenu">Accesorios</li></a>
            <a href=""><li class="li_submenu">Gorras</li></a>
            <a href=""><li class="li_submenu">Sivar</li></a>
          </ul>
        </li>

        <li><a href="index.php">Sivar</a></li>
        <li><a href="">Contactanos</a></li>
        <li><a href="">Pago</a></li>
        <li><a href="close.php"> Cerrar sesion </a></li>
        <li class="imagen"><a href=""><img src="../img/lupa.png" alt=""  /></a></li>
        <li class="imagen"><a href="carrito.php"><img src="../img/carrito.png" alt=""  /></a></li>
      </ul>
    </div>
    <!--End Nav-->


 
    <h2 class="car_tittle">Productos en el carrito</h2>


    

      <?php 
        $sql = "SELECT * FROM carrito INNER JOIN productos ON carrito.id_producto = productos.id WHERE carrito.id_user = {$_SESSION['user']['id']} AND carrito.estado = 'carrito' ";
        $run = mysqli_query($connex, $sql);
        $cantidad = 'cantidad';
        $precio = 'precio';
        
    
     
        
        while ($data = mysqli_fetch_array($run)) {
          $precioTotal += $data['precio'] * $data['cantidad'];
       
          ?>
            <div class="car"> 
            <div class="car__info">
            <h1><?php echo  $data["nombre"] ?></h1><img src="../img/<?php echo  $data["img"] ?>" height="100px" alt="">
              
              <div class="car__info__text">
                
                
                <p>Talla: <?php echo  $data["talla"] ?></p>
                <p>Cantidad: <?php echo  $data["cantidad"] ?></p>
                <p>Precio: $<?php echo  $data["precio"] * $data["cantidad"] ?></p>

                <form method="post">
                <input type="submit" value="Eliminar del carrito" name="eliminarCarrito" class="botones">
                <input type="text" name="id" value="<?php echo $data[0]?>" class="eliminar" hidden >
                </form>

                <form method="post">
                  <input type="submit" value= "Guardar para mas tarde" name="esperaCarrito" class="botones">
                  <input type="text" name="id" value="<?php echo $data[0]?>" hidden>
                </form>

              </div>
            </div>
            <br>
          <?php
        }
      ?>

    </div>

    <div class="precio_final">
   <?php  

    echo '<h1>Total: $' . $precioTotal . '</h1>';
    ?>
    </div>


<h1 class="car_tittle"> Guardado para mas tarde</h1>


<?php 
        $sql = "SELECT * FROM carrito INNER JOIN productos ON carrito.id_producto = productos.id WHERE carrito.id_user = {$_SESSION['user']['id']} AND carrito.estado = 'espera' ";
        $run = mysqli_query($connex, $sql);
        $cantidad = 'cantidad';
        $precio = 'precio';
        
    
     
        
        while ($data = mysqli_fetch_array($run)) {
          $precioTotal += $data['precio'] * $data['cantidad'];
       
          ?>
            <div class="car"> 
            <div class="car__info">
            <h1><?php echo  $data["nombre"] ?></h1><img src="../img/<?php echo  $data["img"] ?>" height="100px" alt="">
              
              <div class="car__info__text">
                
                
                <p>Talla: <?php echo  $data["talla"] ?></p>
                <p>Cantidad: <?php echo  $data["cantidad"] ?></p>
                <p>Precio: $<?php echo  $data["precio"] * $data["cantidad"] ?></p>

                <form method="post">
                <input type="submit" value="Eliminar del carrito" name="eliminarCarrito" class="botones">
                <input type="text" name="id" value="<?php echo $data[0]?>" class="eliminar" hidden >
                </form>

                <form method="post">
                  <input type="submit" value= "Añadir al carrito" name="intoCarrito" class="botones">
                  <input type="text" name="id" value="<?php echo $data[0]?>" hidden>
                </form>

              </div>
            </div>
            <br>
          <?php
        }
      ?>
    
    <a href="index.php"><img src="../img/atras.png" alt="" class="retroceder"></a>
  </body>

  <script src="confirmacion.js"></script> 

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

  