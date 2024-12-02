<?php session_start();
require_once '../controller/conexion.php';?>
<h1>Ingrese su usuario y contraseña</h1>
<form method="post" action="">
    email: <input type="text" name="email"><br><!-- comment -->
    pass: <input type="password" name="pass"><br><!-- comment -->
    <input type="submit" value="Entrar" name="entrar"><br><!-- comment -->
</form>
<!-- valera = furbo -->
<!-- rome = rome -->
<!-- ale = adri -->
<?php
// SI PULSA ENTRAR
if (isset($_POST['entrar'])){
    try {
        $conex = new Conexion();
        $pEncrip = md5($_POST['pass']);
        $result = $conex->query("Select * from empleados where email =  '$_POST[email]' && pass = '$pEncrip' ");
        if ($result->num_rows){
            $_SESSION['usuario'] = $_POST['email'];
            header("Location:menu.php");
            exit();
        }else{
            echo 'Error, usuario o contraseña incorrectos';
        }
    } catch (Exception $ex) {
        
    }
}