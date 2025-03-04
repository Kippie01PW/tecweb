<?php
include_once __DIR__.'/database.php';

// SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
$data = array();

// SE VERIFICA HABER RECIBIDO UN TÉRMINO DE BÚSQUEDA
if (isset($_POST['termino'])) {
    $termino = $conn->real_escape_string($_POST['termino']);
    
    // SE CONSTRUYE LA QUERY DE BÚSQUEDA
    $sql = "SELECT * FROM productos WHERE id = '{$termino}' OR nombre LIKE '%{$termino}%' OR marca LIKE '%{$termino}%'";
    
    // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
    if ($result = $conn->query($sql)) {
        // SE OBTIENEN LOS RESULTADOS
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $producto = array();
            foreach ($row as $key => $value) {
                $producto[$key] = $value; // utf8_encode($value);
            }
            $data[] = $producto;
        }
        $result->free();
    } else {
        die('Query Error: '.mysqli_error($conn));
    }
    $conn->close();
}

// SE HACE LA CONVERSIÓN DE ARRAY A JSON
header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);
?>