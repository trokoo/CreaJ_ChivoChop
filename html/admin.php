<?php include('controladores.php') ;

if(!isset($_SESSION['user']['id'])){
    header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chivo Admin</title>
    
</head>
<style><?php include '../css/style.css'; ?></style>
<body>

    <div class="saludo">
    <h3 class="holi">Bienvenido <?php echo $_SESSION["user"]["user"]?></h3>
    <h3 ><a href="close.php" class="chao"> Cerrar sesion </a></h3>
    </div>


<div class="form_admin">


    <h1 class="products">Subir</h1>


    <form method="post" enctype="multipart/form-data" >



        <input type="text" placeholder="Nombre del articulo" name="nombre"  required>
        <input type="number" placeholder="Precio" step="0.01" name="precio" required>
        <input type="text" placeholder="Descripcion" name="descripcion" required>
        <div class="file-input-container">
        <input type="file" name="img" id="file-input"  required>
        <input type="submit" value="Subir" name="subirProducto" class="botones_admin">
</div>
        
    </form>
    </div>

    <div class="tittle_admin">
    <h1 class="products">Todos los productos</h1>
    </div>

    <?php 
        $sql = "SELECT * FROM carrito INNER JOIN productos ON carrito.id_producto = productos.id WHERE carrito.id_user = {$_SESSION['user']['id']} ";
        $run = mysqli_query($connex, $sql);
     
        
    
     
        
        while ($data = mysqli_fetch_array($run)) {
       
        }
          ?>
   

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
              <p class="wrap"><?php echo $fetch['descripcion'] ?></p>
              
              <form method="post" > 
                <input type="hidden" name="id" value="<?php echo $fetch['id'] ?>">
                <input type="submit" class="eliminar" name="eliminarBase" value="Eliminar"></input><!--Elimina el registro-->
            </form>
             
            </div>
          </div>
        <?php
        }
        ?>
      </div>
   
</body>
</html>