<?php

include_once 'conexion.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM contacto WHERE id_contacto = '$id'";
    $result = mysqli_query($con, $sql);

    if ($fila = mysqli_fetch_assoc($result)) {
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $direccion=$_POST['direccion'];
    $email=$_POST['email'];
    $tel=$_POST['tel'];
    $cel=$_POST['cel'];
    $whatsapp=$_POST['whatsapp'];

    $sql = "UPDATE contacto SET nombre_suc='$nombre',direccion='$direccion',email='$email',tel='$tel',cel='$cel',whatsapp='$whatsapp' WHERE id_contacto = '$id'";


    $resultado = mysqli_query($conex, $sql);


    if ($resultado) {
        echo "<script>
                  alert('¡Contacto Actualizado con éxito!');
                  location.href='administrar.php';
                </script>";
    } else {
        echo "<script>
                    alert('No fue posible actualizar correctamente, intentelo de nuevo ...');
                    location.href='administrar.php';
                </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar contacto</title>
</head>

<body>

    <br>
    <h3> <a href="administrar.php"> Contactos -> Administrar</a> </h3>

    <center>
        <h1> Actualizar contactos</h1>

        <hr>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <table border="1">
                <tr>
                    <td> <label for="nombre"> Nombre: </label> </td>
                    <td> <input type="text" name="nombre" value="<?php echo $fila['nombre_suc'] ?>" required></td>
                </tr>
                <tr>
                    <td> <label for="direccion"> Dirección: </label> </td>
                    <td> <input type="text" name="dir" value="<?php echo $fila['direccion'] ?>" required></td>
                </tr>
                <tr>
                    <td> <label for="email"> Email: </label> </td>
                    <td> <input type="email" name="email" value="<?php echo $fila['email'] ?>" required></td>
                </tr>
                <tr>
                    <td> <label for="tel"> Telefono: </label> </td>
                    <td> <input type="tel" name="tel" value="<?php echo $fila['tel'] ?>" required></td>
                </tr>
                <tr>
                    <td> <label for="cel"> Celular: </label> </td>
                    <td> <input type="tel" name="cel" value="<?php echo $fila['cel'] ?>" required></td>
                </tr>
                <tr>
                    <td> <label for="wpp"> Whatsapp: </label> </td>
                    <td> <input type="tel" name="wpp" value="<?php echo $fila['whatsapp'] ?>" required></td>
                </tr>
                <tr>
                    <td> <input type="hidden" name="id" value="<?php echo $fila['id_contacto'] ?>" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <button type="submit"> Guardar </button>
                    </td>
                </tr>
            </table>
            <hr>
        </form>
    </center>
</body>

</html>