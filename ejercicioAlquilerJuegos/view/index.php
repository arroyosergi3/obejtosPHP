<?php session_start();
require_once '../controller/conexion.php';
require_once '../controller/cerrarSesion.php';
require_once '../model/Cliente.php';
if (isset($_SESSION['cliente'])){
    header("Location:../controller/cerrarSesion.php");
    exit();
}
?>
<h1>Ingrese su usuario y contraseña</h1>
<form method="post" action="">
    dni: <input type="text" name="dni"><br><!-- comment -->
    pass: <input type="password" name="pass"><br><!-- comment -->
    <input type="submit" value="Entrar" name="entrar"><br><!-- comment -->
</form>
<form action="registro.php">
    <input type="submit" value="Registrar" name="registrar"><br><!-- comment -->
</form>
<!-- 1234 pass -->
<!-- ales adri -->

<?php
// SI PULSA ENTRAR
if (isset($_POST['entrar'])){
    try {
        $conex = new Conexion();
        $pEncrip = md5($_POST['pass']);
        $result = $conex->query("Select * from cliente where DNI =  '$_POST[dni]' && Clave = '$pEncrip' ");
        if ($result->num_rows){
            $_SESSION['usuario'] = $_POST['dni'];
            $fila = $result->fetch_object();
            $c = new Cliente($fila->DNI,$fila->Nombre,$fila->Apellidos,$fila->Direccion,$fila->Localidad,$fila->Clave,$fila->Tipo);
            $_SESSION['cliente'] = $c;
            header("Location:inicio.php");
            exit();
        }else{
            echo 'Error, usuario o contraseña incorrectos';
        }
    } catch (Exception $ex) {
        die("Esto es el catch");
    }
}