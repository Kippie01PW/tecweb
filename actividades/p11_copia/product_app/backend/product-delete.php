<?php

include_once __DIR__.'/database.php';

if(isset($_POST['id'])){
    $id = $_POST['id']; 
    
    $query = "UPDATE productos SET eliminado = 1 WHERE id = $id ";
    $result = mysqli_query($conexion, $query); 

    if(!$result){
        die ('Consulta fallida'); 
    }
    echo "Producto eliminado correctamente"; 
}
?>