<?php
    include_once __DIR__.'/database.php';
    $id = $_POST['id']; 
    $query = "SELECT * FROM productos WHERE id = $id"; 
    $result = mysqli_query($conexion, $query); 

    if(!$result){
        die ('Consulta fallida'); 
    }

    $json = array(); 
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'name' => $row['nombre'],
            'description' => json_encode(array(
                'precio' => $row['precio'],
                'unidades' => $row['unidades'],
                'modelo' => $row['modelo'],
                'marca' => $row['marca'],
                'detalles' => $row['detalles'],
                'imagen' => $row['imagen']
            )),
            'id' => $row['id']
        ); 
    }

    $jsonstring = json_encode($json[0]); 
    echo $jsonstring; 
?>
