<?php
include_once __DIR__.'/database.php';

$data = array();

if (isset($_POST['termino'])) {
    $termino = $conn->real_escape_string($_POST['termino']);
    
    $sql = "SELECT * FROM productos WHERE id = '{$termino}' OR nombre LIKE '%{$termino}%' OR marca LIKE '%{$termino}%'";

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
header('Content-Type: application/json');
echo json_encode($data, JSON_PRETTY_PRINT);
?>