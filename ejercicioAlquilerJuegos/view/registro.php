<?php
require_once '../controller/cerrarSesion.php';
require_once '../controller/ClienteController.php';
require_once '../model/Cliente.php';
if (isset($_POST['registrar'])) {
    try {
        $pass = md5($_POST['clave']);
        $cliente = new Cliente($_POST['dni'], $_POST['nombre'], $_POST['apellidos'], $_POST['direccion'], $_POST['localidad'], $pass, "cliente");
        if (ClienteController::insertar($cliente) > 0) {
            echo 'Ha sido insertado con exito';
        } else {
            echo 'Algo ha habido mal';
        }
    } catch (Exception $ex) {
        die("EEERRROOORR: " . $ex->getMessage());
    }
}
?>
<form action="" method="post">
    DNI: <input type="text" name="dni"><br>
    Nombre: <input type="text" name="nombre"><br>
    Apellidos: <input type="text" name="apellidos"><br>
    Direccion: <input type="text" name="direccion"><br>
    Localidad: <input type="text" name="localidad"><br>
    Clave: <input type="text" name="clave"><br>
    <input type="submit" name="registrar" value="Registrar">
</form>
<form action="../controller/cerrarSesion.php" method="post">
    <input type="submit" name="login" value="Login">
</form>