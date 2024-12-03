<form method="post" enctype="multipart/form-data">
    codigo: <input type="tex" name="codigo"><br>
    nombre: <input type="tex" name="nombre"><br>
    precio: <input type="tex" name="precio"><br>
    imagen: <input type="file" name="imagen"><br>
    <input type="submit" value="Insertar" name="insertar">
    <input type="submit" value="Mostrar" name="mostrar">
</form>
<?php
if (isset($_POST['insertar'])){
    echo "Nombre: ". $_FILES['imagen']['name']."<br>";   
    echo "Nombre Temporal : ". $_FILES['imagen']['tmp_name']."<br>";  
    echo "Tamaño: ". $_FILES['imagen']['size']."<br>";     
    echo "Tipo: ". $_FILES['imagen']['type']."<br>";   
    echo "Error: ". $_FILES['imagen']['error']."<br>";   
    
    if (is_uploaded_file($_FILES['imagen']['tmp_name'])){
        $fich = time()."-".$_FILES['imagen']['name'];
        $ruta = "img/$fich";
        move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
        try {
            $conex = new mysqli("localhost", "dwes","abc123.", "producto");
            $conex ->query("INSERT INTO producto VALUES ('$_POST[codigo]', '$_POST[nombre]', $_POST[precio], '$ruta')");
        } catch (Exception $ex) {
            
        }
    }
        
}

if (isset($_POST['mostrar'])){
    try {
         $conex = new mysqli("localhost", "dwes","abc123.", "producto");
            $result = $conex ->query("SELECT * from producto");
            if ($result->num_rows){
                while ($reg = $result->fetch_object()){
                    echo "Codigo: $reg->codigo <br>";
                    echo "Nombre: $reg->nombre <br>";
                    echo "Precio: $reg->precio <br>";
                    echo "<img src=$reg->imagen ></img> <br>";
                }
            }
    } catch (Exception $ex) {
        
    }
}


