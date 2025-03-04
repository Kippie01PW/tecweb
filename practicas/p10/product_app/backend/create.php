<?php
include_once __DIR__.'/database.php';

// SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
$producto = file_get_contents('php://input');
if (!empty($producto)) {
    // SE TRANSFORMA EL STRING DEL JSON A OBJETO
    $jsonOBJ = json_decode($producto, true); // Asegurarse de decodificar como un arreglo asociativo
    
    $nombre = $jsonOBJ['nombre'];
    $precio = $jsonOBJ['valores']['precio'];
    $unidades = $jsonOBJ['valores']['unidades'];
    $modelo = $jsonOBJ['valores']['modelo'];
    $marca = $jsonOBJ['valores']['marca'];
    $descripcion = $jsonOBJ['valores']['detalles'];
    $imagen = $jsonOBJ['valores']['imagen'];

    $sql = "SELECT * FROM productos WHERE (nombre = '$nombre' AND marca = '$marca') OR (marca = '$marca' AND modelo = '$modelo')";
    $result = $conn->query($sql); // Usar $conn para la consulta y conexión
    
    
    if($result->num_rows > 0){
        echo "ERROR, YA ESTÁ DADO DE ALTA ESTE PRODUCTO";
    } else {
        // Preparar la consulta SQL para insertar los datos en la base de datos
        $sql = "INSERT INTO productos (id, nombre, marca, modelo, precio, detalles, unidades, imagen) 
            VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$descripcion}', {$unidades}, '{$imagen}')";
        
        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            echo "Producto registrado con éxito.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Cerrar la conexión
        $conn->close();
    }
} else {
    echo "No se recibió información del producto.";
}
?>
