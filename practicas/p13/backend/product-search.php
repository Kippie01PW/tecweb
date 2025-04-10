<?php

    require_once __DIR__ . '/../vendor/autoload.php';
    use Backend\Read\Read;

    $products = new Read();
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