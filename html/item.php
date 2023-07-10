<?php 


include('controladores.php');
session_start();

$idItem = $_GET["id"];
$consulta = "SELECT * FROM productos WHERE id = $idItem";
$resultado = mysqli_query($connex,$consulta);

if (mysqli_num_rows($resultado)){
    $item = mysqli_fetch_assoc($resultado);
} else {
    header("location: index.php");
}


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

        <li><a href="">Sivar</a></li>
        <li><a href="">Contactanos</a></li>
        <li><a href="">Pago</a></li>
        <li><a href="close.php"> Cerrar sesion </a></li>
        <li class="imagen"><a href=""><img src="../img/lupa.png" alt=""  /></a></li>
        <li class="imagen"><a href="carrito.php"><img src="../img/carrito.png" alt=""  /></a></li>
      </ul>
    </div>
    <!--End Nav-->

      <!--compra-->

      <div class="cont">
        <div class="item"><img src="../img/<?php echo  $item["img"] ?>" alt=""></div>
        <form action="" method="post" class="datos">
            <h1><?php echo  $item["nombre"] ?></h1>

            <p><?php echo  $item["descripcion"] ?></p>

           

           

            <h1>Talla <select name="talla" id="">

                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>

            </select>

            <h1>Cantidad <select name="cantidad" id="" type="number">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                
            </select>


            <h3>$<?php echo  $item["precio"] ?></h3>

         
            <input type="submit" value="Añadir al carrito" name="agregarCarrito" class="button"></input>
          </form>
         
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