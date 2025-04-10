<?php

    require_once __DIR__ . '/../vendor/autoload.php';
    use Backend\Read\Read;

    $products = new Read();
    if( isset($_POST['id']) ){
        $id = $_POST['id']; 

        $response = $products->singleProduct($id); 
        echo $response; 
    }  else {
        echo json_encode([
            'status' => 'error',
            'message' => 'No se encontró la id, verifica que esté insertada correctamente'
        ]);
    }
?>