<?php

    require_once './Delete/delete.php';
    use MyAPI\Delete;

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