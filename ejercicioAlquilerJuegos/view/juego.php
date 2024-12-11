<?php
require_once '../model/Juego.php';
require_once '../model/Cliente.php';
require_once '../controller/JuegosController.php';

session_start();
try {
    $juego = JuegosController::buscar($_GET['cod']);
    if (!$juego) {
        echo 'No encuentro el juego';
    }
} catch (Exception $ex) {
    echo 'NO FUFA';
}
?>
<img src="<?php echo $juego->Imagen ?>" width="300px" height="300px"/>
<?php
if (isset($_POST['modificar'])) {
    ?>
    <form action="" method="post">
        Nombre: <input type="text" value="<?php echo $juego->Nombre_juego ?>" name="nombre"><br>
        Año: <input type="text" value="<?php echo $juego->Anno ?>" name="anno"><br>
        Consola: <input type="text" value="<?php echo $juego->Nombre_consola ?>" name="consola"><br>
        Precio: <input type="number" value="<?php echo $juego->Precio ?>" name="precio"><br>
        <input type="submit" value="Guardar" name="guardar"></form>  
    </form>
    <?php
} else if (!isset($_POST['guardar'])) {
    ?>
    <h1>Datos</h1>
    <p>Nombre: <?php echo $juego->Nombre_juego ?></p>
    <p>Año: <?php echo $juego->Anno ?></p>
    <p>Consola: <?php echo $juego->Nombre_consola ?></p>
    <p>Precio: <?php echo $juego->Precio ?></p>
    <?php
}
if (isset($_POST['guardar'])) {
    $filas = JuegosController::update($_POST['nombre'], $_POST['consola'], $_POST['precio'], $_POST['anno'], $juego->Codigo);
    if ($filas > 0) {
        echo 'Registro modificado con exito';
        $juego = JuegosController::buscar($_GET['cod']);
        ?>
        <h1>Datos</h1>
        <p>Nombre: <?php echo $juego->Nombre_juego ?></p>
        <p>Año: <?php echo $juego->Anno ?></p>
        <p>Consola: <?php echo $juego->Nombre_consola ?></p>
        <p>Precio: <?php echo $juego->Precio ?></p>
        <?php
    } else {
        echo 'NO se ha modificado';
    }
}
if (isset($_POST['eliminar'])){
    $hecho = JuegosController::delete($juego->Codigo);
    if ($hecho){
        header("Location:inicio.php?msg=1");
        exit();
    }else{
        echo 'No se ha podido eliminar por lo que sea';
    }
}



if ($_SESSION['cliente']->Tipo == "admin") {
    echo '<form action="" method="post">
        <input type="hidden" name="cod" value="<?php echo $juego->Codigo ?>"><input type="submit" value="Eliminar" name="eliminar"></form>';
    echo '<form action="" method="post"><input type="submit" value="Modificar" name="modificar"></form>';
}