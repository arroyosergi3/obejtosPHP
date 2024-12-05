<?php
require_once '../model/Juego.php';
require_once '../controller/JuegosController.php';
if (isset($_POST['anadir'])) {

    if (is_uploaded_file($_FILES['imagen']['tmp_name'])) {
        $fich = time() . "-" . $_FILES['imagen']['name'];
        $ruta = "img/$fich";
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
        try {
            //INSERTAR AQUI
            $palabras = explode(' ', $_POST['nombre']);
            $codigo = '';
            foreach ($palabras as $palabra) {
                if (!empty($palabra)) {
                    $codigo += ($palabra[0]);
                }
            }
            $codigo += "-".$_POST['consola'];
            $juego = new Juego();
        } catch (Exception $ex) {
            
        }
    }
}
?>
<h1>Juego Nuevo</h1>
<form action="">
    Nombre:<input type="text" name="nombre"><br>
    Año:<input type="text" name="ano"><br>
    Consola:<input type="text" name="consola"><br>
    Precio:<input type="number" name="precio"><br>
    Imagen:<input type="file" name="imagen"><br>
    <input type="submit" name="anadir" value="Añadir">
</form>