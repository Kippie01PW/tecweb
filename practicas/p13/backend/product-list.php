<?php
    
    require_once __DIR__ . '/../vendor/autoload.php';
    use Backend\Read\Read;

    $products = new Read();
    $response = $products->listProduct(); 
    echo $response; 
?>