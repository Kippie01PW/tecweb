<?php

    require_once __DIR__ . '/../vendor/autoload.php';
    use Backend\Delete\Delete;

    $products = new Delete();
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