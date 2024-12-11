<?php
require_once '../model/Cliente.php';
require_once '../model/Juego.php';
require_once '../controller/JuegosController.php';
session_start();
echo 'Hola, ' . $_SESSION['cliente']->Nombre . " " . $_SESSION['cliente']->Apellidos;
echo '<br>';
if (isset($_GET['msg']) && $_GET['msg'] == 1){
    echo 'Juego Eliminado con éxito';
}
?>
<form action="registro.php" method="post"><input type="submit" name="registro" value="Registro"></form>
<form action="index.php" method="post"><input type="submit" value="Login" name="login"></form>
<br><br><br><!-- comment -->
<form action="index.php" method="post"><input type="submit" value="Todas" name="login"></form>
<form action="index.php" method="post"><input type="submit" value="Mis Alquiladas" name="login"></form>
<form action="index.php" method="post"><input type="submit" value="No Alquiladas" name="login"></form>
<form action="index.php" method="post"><input type="submit" value="Salir" name="salir"></form>
<?php
if ($_SESSION['cliente']->Tipo == "admin") {
    echo '<form action="nuevo.php" method="post"><input type="submit" value="Nuevo" name="nuevo"></form>';
}
?>
<h1 style="text-align: center">Juegos</h1>
<?php
$juegos = JuegosController::getAll();
if ($juegos) {
    foreach ($juegos as $key => $value) {
        echo '<a href="juego.php?cod='.$value->Codigo.'"><img width="20%" style="margin: 20px;" src="'.$value->Imagen.'"></a>';
    }
}