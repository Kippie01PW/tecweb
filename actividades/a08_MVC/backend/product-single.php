<?php

    require_once './myapi/Products.php';
    use MyAPI\Products;

    $products = new Products();
    if( isset($_POST['id']) ){
        $id = $_POST['id']; 

        $reponse = $products->singleProduct($id); 
        echo $response; 
    }  else {
        echo json_encode([
            'status' => 'error',
            'message' => 'No se encontró la id, verifica que esté insertada correctamente'
        ]);
    }
?>