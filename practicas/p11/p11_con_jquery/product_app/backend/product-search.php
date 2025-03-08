<?php
    include_once __DIR__.'/database.php';

    $search = $_POST['search']; 

    if(!empty($search)){
        $query = "SELECT * FROM productos WHERE nombre like '$search%'"; 
        $result =  mysqli_query($conexion, $query); 
        if(!$result){
            die('Error de consulta' . mysqli_error($conexion)); 
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
        echo $jsonstring; 
    }
?>