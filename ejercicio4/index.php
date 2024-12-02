<?php
include_once 'Zona.php';

$zona_principal = new Zona("Sala Principal", 1000);
$zona_venta = new Zona("Zona de Compra-Venta", 200);
$zona_vip = new Zona("Zona VIP", 25);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $zona = $_POST['zona'];
    $cantidad = $_POST['cantidad'];

    switch ($zona) {
        case 'principal':
            $zona_seleccionada = $zona_principal;
            break;
        case 'venta':
            $zona_seleccionada = $zona_venta;
            break;
        case 'vip':
            $zona_seleccionada = $zona_vip;
            break;
        default:
            $zona_seleccionada = null;
            break;
    }
    if ($zona_seleccionada && $zona_seleccionada->vender($cantidad)) {
        $mensaje = "Se han vendido $cantidad entradas para la zona " . $zona_seleccionada->getNombreZona() . ".";
    } else {
        $mensaje = "No hay suficientes entradas disponibles en la zona seleccionada.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venta de Entradas - Expocoches Campanillas</title>
</head>
<body>
    <h1>Venta de Entradas - Expocoches Campanillas</h1>

    <h2>Entradas disponibles:</h2>
    <ul>
        <li><?php echo $zona_principal->toString(); ?></li>
        <li><?php echo $zona_venta->toString(); ?></li>
        <li><?php echo $zona_vip->toString(); ?></li>
    </ul>

    <h2>Vender Entradas</h2>
    <form method="POST">
        <label for="zona">Selecciona una zona:</label>
        <select name="zona" id="zona">
            <option value="principal">Sala Principal</option>
            <option value="venta">Zona de Compra-Venta</option>
            <option value="vip">Zona VIP</option>
        </select><br><br>

        <label for="cantidad">Cantidad de entradas:</label>
        <input type="number" name="cantidad" id="cantidad" min="1" required><br><br>

        <input type="submit" value="Vender">
    </form>

    <?php
    if (isset($mensaje)) {
        echo "<p>$mensaje</p>";
    }
    ?>

</body>
</html>
