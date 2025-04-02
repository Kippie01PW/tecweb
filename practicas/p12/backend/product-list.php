<?php
    
    require_once './Read/read.php';
    use MyAPI\Read;

    $products = new Read();
    $response = $products->listProduct(); 
    echo $response; 
?>