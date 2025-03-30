<?php

    require_once './myapi/Products.php';
    use MyAPI\Products;

    $products = new Products();
    if (isset($_POST['id'])){
        $id = $_POST['id'];

        $response = $products->deleteData($id); 
        echo $response; 
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'No se encontró la id, verifica'
        ]);
    }
?>