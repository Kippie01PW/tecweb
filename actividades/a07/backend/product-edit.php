<?php

    require_once './myapi/Products.php';
    use MyAPI\Products;

    $products = new Products();
    if( isset($_POST['id']) ) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $precio = $_POST['precio'];
        $detalles = $_POST['detalles'];
        $unidades = $_POST['unidades'];
        $imagen = $_POST['imagen'];

        $response = $products->editProduct($id, $nombre, $marca, $modelo, $precio, $detalles, $unidades, $imagen); 
    }
?>