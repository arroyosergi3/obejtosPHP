
<?php

require_once './persona.php';
require_once './empleado.php';
$p = new Persona("Aleh", "Teban", 20);
echo $p->nombre . " " . $p->apellidos . " " . $p->edad . "<br>";
$p->apellidos = "Pepe";
echo $p->nombre . " " . $p->apellidos . " " . $p->edad . "<br>";

echo $p . "<br>";
echo Persona::getNumPerson() . "<br>";

$p2 = new Persona("Aleh", "Teban", 20);
echo $p . "<br>";
echo Persona::getNumPerson() . " <br>";

echo Persona::getNumPerson() . " <br>";
Persona::eliminarPersona();
echo Persona::getNumPerson() . " <br>";
modificaEdad($p);
echo $p;
echo '<br><br><br><br><br>';



echo '<br>==================== CONVERTIR A JSON Y VICEVERSA ===================<br>';

// ENCRIPTO LA P
$p_encode = json_encode($p);
//MUESTRO LA P ENCRIPTADA
var_dump($p_encode);
echo '<br>';
echo '<br>';
// DESENCRIPTO LA PERSONA ENCRIPTADA
$p_decode = json_decode($p_encode);
//MUESTRO LA P DESENCRIPTADA
var_dump($p_decode);
echo '<br>'.$p_decode->nombre;
$newp = new Persona($p_decode->nombre, $p_decode->apellidos, $p_decode->edad);

echo '<br>==================== COPIAR OBJETOS ===================<br>';
$p4 = $p;
echo "P: ".$p."<br>";
echo "P4: ".$p4."<br>";
$p4->nombre = "NOPE";
echo "P: ".$p."<br>";
echo "P4: ".$p4."<br>";


$p4 = clone ($p);
$p4->nombre = "NONONO";
echo "P: ".$p."<br>";
echo "P4: ".$p4."<br>";

echo Persona::getNumPerson() . " <br>";


echo '<br>==================== COMPARAR OBJETOS ===================<br>';
if ($p === $p4){
    echo 'SON IGUALES';
}else{
    echo 'SON DIFERENTES';
}

echo '<br>';
$p5 = $p4;
if ($p5 === $p4){
    echo 'SON IGUALES';
}else{
    echo 'SON DIFERENTES';
}



echo '<br>==================== HERENCIA ===================<br>';
$em = new Empleado("Danie", "Romero", 54, 2500);
echo $em->nombre. " y cobro ".$em->salario;







        function modificaEdad($per) {
    $per->edad = 100;
}



?>
  