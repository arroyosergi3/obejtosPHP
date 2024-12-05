<?php
session_start();
require_once '../controller/TareaController.php';
require_once '../controller/RealizaController.php';
require_once '../model/Tarea.php';

if (isset($_POST['modifica'])) {
   

    $realiza = RealizaController::buscarPorEmail($_SESSION['usuario']);
    if ($realiza) {
        $resultadoRealiza = RealizaController::update($_POST['horas'], $_SESSION['usuario'], $_POST['id']);
    }else{
        echo 'NO REALIZA';
    }

    // Feedback para el usuario
    if ( $resultadoRealiza > 0) {
        echo "Actualizado correctamente.";
    } else {
        echo "No se realizaron cambios en la bbdd.";
    }
}
?>
<h1>Actualiza Tarea</h1>
<table border="1">
    <tr>
        <th>Nombre Tarea</th>
        <th>Fecha Inicio</th>
        <th>Fecha Fin</th>
        <th>Horas ...</th>
        <th>Modifica</th>
    </tr>
<?php
$realiza = RealizaController::buscarPorEmail($_SESSION['usuario']);
//echo 'ANTES DEL FOREACH: '. count($realiza);

foreach ($realiza as $key => $value) {
    
   // echo 'HAY TAREAS';
    $tarea = TareaController::buscar($value->idTarea);
    echo "<tr>";
    echo "<td> $tarea->nombre </td>";
    echo "<td> $tarea->fechaInicio </td>";
    echo "<td> $tarea->fechaFin </td>";
    echo '<form method="post" action="">';
    echo '<td> <input type="number" name="horas" value="' . $value->horas . '"> </td>';
     echo '<input type="hidden" name="id" value="'.$tarea->id.'">';
    echo '<td> <input type="submit" name="modifica" value="Modifica"></td>';
   
    echo '</form>';
    echo "</tr>";
}
?>

</table>