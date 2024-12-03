<?php
session_start();
require_once '../controller/empleadosController.php';
require_once '../controller/conexion.php';
require_once '../model/Tarea.php';
require_once '../model/Realiza.php';
require_once '../controller/TareaController.php';
require_once '../controller/RealizaController.php';
?>
<h1> Nueva tarea </h1>
<form method="post">
    Nombre:<input type="text" name="nombre"><br>
    Fecha Inicio:<input type="date" name="fInicio"><br>
    Fecha Fin:<input type="date" name="fFin"><br>
    <?php
    try {

        if (empleadosController::buscar($_SESSION['usuario'])) {
            $em = empleadosController::buscar($_SESSION['usuario']);
            if (empleadosController::getAllconDep($em->dep)) {
                $empMismoDep = empleadosController::getAllconDep($em->dep);
            }
        }
    } catch (Exception $ex) {
        
    }
    /*
    foreach ($empMismoDep as $key => $value) {
        echo $value."<br>";
    }
     
     */
    ?>
    Participantes:<select name="participantes[]" multiple="">
    <?php
    foreach ($empMismoDep as $key => $value) {
        if ($value->email != $em->email) {
            ?>
                <option value="<?php echo $value->email ?>"><?php echo $value->email ?></option>
                <?php
            }
        }
        ?>
    </select>
    <input type="submit" name="crear" value="Crear Nueva Tarea">
</form>

<?php 
        if (isset($_POST['crear'])){
            $t = new Tarea($_POST['nombre'], $_POST['fInicio'], $_POST['fFin']);
            TareaController::insertar($t);
            if ($t = TareaController::buscarPorNOmbre($_POST['nombre'])){
                echo 'EL ID DE LA TAREA ES:' .$t->id;
                /*$h = (strtotime($_POST['fFin']) - strtotime($_POST['fInicio'])) / 3600;
                foreach ($_POST['participantes'] as $key => $value) {
                $r = new Realiza($value, $t->id, $h);
                RealizaController::insertar($r);
            }*/
            }
            
        }