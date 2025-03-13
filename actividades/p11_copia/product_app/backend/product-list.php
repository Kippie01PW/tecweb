<?php

    include_once __DIR__.'/database.php';

    $query = "SELECT * FROM productos WHERE eliminado = 0"; 
    $result = mysqli_query($conexion, $query); 

    if(!$result){
        die('Conexión fallida'.mysqli_error($conexion));  
    }

    $json = array(); 
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'name' => $row['nombre'],
            'description' => $row['detalles'],
            'id' => $row['id']
        ); 
    }
    $jsonstring = json_encode($json); 
    echo $jsonstring
?>