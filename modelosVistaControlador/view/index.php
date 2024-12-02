<form action="" method="post">
    Codigo: <input type="text" name="codigo"><br><!-- comment -->
    Nombre: <input type="text" name="nombre"><br><!-- comment -->
    Precio: <input type="number" name="precio"><br><!-- comment -->
    <input type="submit" value="Enviar" name="enviar">
    <input type="submit" value="Mostrar" name="mostrar">
    <input type="submit" value="Buscar" name="buscar">
</form><!-- comment -->
<?php
require_once '../model/producto.php';
require_once '../controller/ProductoController.php';

if (isset($_POST['enviar'])) {
    $p = new Producto($_POST['codigo'], $_POST['nombre'], $_POST['precio']);
    if(ProductoController::insertar($p)){
        echo 'Producto insertado Correctamente';
    }else{
        echo 'No se ha podido insertar el producto';
    }
    
}
if (isset($_POST['mostrar'])) {
    if (ProductoController::getAll()) {
        $ps = ProductoController::getAll();
        foreach ($ps as $key => $value) {
            echo $value . "<br>";
        }
    } else {
        echo 'No hay productos en la BBDD';
    }
}

if (isset($_POST['buscar'])) {
    if ($producto = ProductoController::buscar($_POST['codigo'])) {
        echo $producto;
    } else {
        echo 'No se encuentra el producto en la BBDD';
    }
}
?>

