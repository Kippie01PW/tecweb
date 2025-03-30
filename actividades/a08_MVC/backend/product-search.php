<?php

    require_once './myapi/Products.php';
    use MyAPI\Products;

    $products = new Products();
    if(isset($_GET['search'])){
        $search = $_GET['search']; 

        $response = $products->searchProduct($search);
        echo $response; 
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'No se encontró el producto a buscar'
        ]);
    }
?>