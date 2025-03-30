<?php
    
    require_once './myapi/Products.php';
    use MyAPI\Products;

    $products = new Products();
    $response = $products->listProduct(); 
    echo $response; 
?>