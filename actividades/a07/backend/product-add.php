<?php

require_once './myapi/Products.php';
$products = new Products();

if (isset($_POST['nombre'])) {
    // Capturar los valores enviados desde el formulario
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $precio = $_POST['precio'];
    $detalles = $_POST['detalles'];
    $unidades = $_POST['unidades'];
    $imagen = $_POST['imagen'];

    $response = $products->addProduct($nombre, $marca, $modelo, $precio, $detalles, $unidades, $imagen);

    echo $response;
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Faltan uno o más datos para agregar el producto'
    ]);
}