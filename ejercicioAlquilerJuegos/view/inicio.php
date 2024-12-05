<?php
require_once '../model/Cliente.php';
session_start();
echo 'Hola, ' . $_SESSION['cliente']->Nombre . " " . $_SESSION['cliente']->Apellidos;
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
<h1>Juegos</h1>
