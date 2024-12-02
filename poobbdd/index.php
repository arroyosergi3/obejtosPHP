<?php
require_once './producto.php';
/*
  $p = new Producto("camisa01", "Camisa manga larga", 25);
  echo $p."<br>";
  $p1 = new Producto();
  $p1->nuevoProducto("pantalon01", "Pantalon vaquero", 30);
  echo $p1."<br>";
 */

if (isset($_POST['enviar'])) {
    $p = new Producto($_POST['codigo'], $_POST['nombre'], $_POST['precio']);
    if ($p->insertar()) {
        echo 'Se ha insertado correctamente';
    } else {
        echo 'Po no se ha insertao';
    }
}
if (isset($_POST['mostrar'])) {
    if (Producto::getAll()) {
        $ps = Producto::getAll();
        foreach ($ps as $key => $value) {
            echo $value . "<br>";
        }
    } else {
        echo 'No hay productos en la BBDD';
    }
}

if (isset($_POST['buscar'])) {
    if ($producto = Producto::buscar($_POST['codigo'])) {
        echo $producto;
    } else {
        echo 'No se encuentra el producto en la BBDD';
    }
}
?>
<form action="" method="post">
    Codigo: <input type="text" name="codigo"><br><!-- comment -->
    Nombre: <input type="text" name="nombre"><br><!-- comment -->
    Precio: <input type="number" name="precio"><br><!-- comment -->
    <input type="submit" value="Enviar" name="enviar">
    <input type="submit" value="Mostrar" name="mostrar">
    <input type="submit" value="Buscar" name="buscar">
</form><!-- comment -->
