<?php

    include('conexion.php');
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);

      
    

    //Subir producto
    if (isset($_POST['subirProducto'])) {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $nombreimagen = $_FILES['img']['name'];

        $folder=$_SERVER['DOCUMENT_ROOT'] . '/chivochop/' . '/img/';
        move_uploaded_file($_FILES['img']['tmp_name'],$folder.$nombreimagen);

    
        $sql = "INSERT INTO productos (nombre, precio, descripcion, img) VALUES ('$nombre', '$precio', '$descripcion', '$nombreimagen')";
        $run = mysqli_query($connex, $sql);
    
        if ($run) {
            header("Location: admin.php",true,303);
        }
    }

    //Eliminar producto 
    if (isset($_POST['eliminarBase'])) {
        $id = $_POST['id'];

        $sql = "DELETE FROM productos WHERE id = '$id'";
        $run = mysqli_query($connex, $sql);
        header("Location: admin.php",true,303);
    }



    //Gestionar carrito (Eliminar)
    if (isset($_POST['eliminarCarrito'])) {
        $id = $_POST['id'];

        $sql = "DELETE FROM carrito WHERE id = '$id'";
        $run = mysqli_query($connex, $sql);
        header("Location: carrito.php",true,303);
    }
    
    //Producto espera

     if (isset($_POST['esperaCarrito'])) {
        $id = $_POST['id'];

        $sql = "UPDATE carrito SET estado = 'espera' WHERE id = '$id'";
        $run = mysqli_query($connex, $sql);
        header("Location: carrito.php",true,303);
    }


    //Producto carrito

    if (isset($_POST['intoCarrito'])) {
        $id = $_POST['id'];

        $sql = "UPDATE carrito SET estado = 'carrito' WHERE id = '$id'";
        $run = mysqli_query($connex, $sql);
        header("Location: carrito.php",true,303);
    }

    //login
    if (isset($_POST['login'])) {
        $correo = $_POST['email'];
        $contraseña = $_POST['pass'];
            
        $consulta = "SELECT * FROM usuarios WHERE email = '$correo' AND pass = '$contraseña'";
        $resultado = mysqli_query($connex,$consulta);

        if (mysqli_num_rows($resultado)){
            $row = mysqli_fetch_assoc($resultado);
            $_SESSION["user"] = $row;

            if ($row["rol"] == "user") {
                header('Location: index.php');
            }else{
                header('Location: admin.php');
            }
            
        } else {
            echo 'Datos incorrectos';
        }
    }

    //registro
    if (isset($_POST['registro'])) {
        $nombre = $_POST['user'];
        $correo = $_POST['email'];
        $contraseña = $_POST['pass'];

        $sql = "SELECT * from usuarios where email = '$correo' ";
        $runn = mysqli_query($connex, $sql);

        if (mysqli_num_rows($runn)) {
            echo'<script type="text/javascript">
            alert("Correo ya registrado");
            
            </script>';
            return;
        }


        $insert_data = "INSERT INTO usuarios (user, email, pass, rol) VALUES ('$nombre', '$correo', '$contraseña', 'user')";
        $run = mysqli_query($connex, $insert_data);

        if ($run){

           
            header('Location: login.php');


        } else {
            echo 'Datos incorrectos';
        }
    }

    //añadir al carrito
    if (isset($_POST['agregarCarrito'])) {
        $id_producto = $_GET['id'];
        $id_usuario = $_SESSION["user"]["id"];
        $cantidad = $_POST['cantidad'];
        $talla = $_POST['talla'];

        $sql = "INSERT INTO carrito (id_producto, id_user, cantidad, talla, estado) VALUES ('$id_producto', '$id_usuario', '$cantidad', '$talla', 'carrito')";
        $run = mysqli_query($connex, $sql);

        if ($run){
            header('Location: carrito.php');
        } else {
            echo 'Datos incorrectos';
        }
    }

    //Contactos

    


?>