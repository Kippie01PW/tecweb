<?php
include_once __DIR__.'/database.php';


$producto = file_get_contents('php://input');
if (!empty($producto)) {
    $jsonOBJ = json_decode($producto, true); 
    
    $nombre = $jsonOBJ['nombre'];
    $precio = $jsonOBJ['valores']['precio'];
    $unidades = $jsonOBJ['valores']['unidades'];
    $modelo = $jsonOBJ['valores']['modelo'];
    $marca = $jsonOBJ['valores']['marca'];
    $descripcion = $jsonOBJ['valores']['detalles'];
    $imagen = $jsonOBJ['valores']['imagen'];

    $sql = "SELECT * FROM productos WHERE (nombre = '$nombre' AND marca = '$marca' AND eliminado = 0) OR (marca = '$marca' AND modelo = '$modelo' AND eliminado = 0)";
    $result = $conn->query($sql); 
    
    
    if($result->num_rows > 0){
        echo "ERROR, YA ESTÁ DADO DE ALTA ESTE PRODUCTO";
    } else {
        $sql = "INSERT INTO productos (id, nombre, marca, modelo, precio, detalles, unidades, imagen) 
            VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$descripcion}', {$unidades}, '{$imagen}')";
    
        if ($conn->query($sql) === TRUE) {
            echo "Producto registrado con éxito.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
} else {
    echo "No se recibió información del producto.";
}
?>
