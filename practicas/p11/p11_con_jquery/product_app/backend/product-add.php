<?php
    include_once __DIR__.'/database.php';

    if(isset($_POST['name']) && isset($_POST['description'])){
        $name = $_POST['name']; 
        $description = $_POST['description']; 

        // Decodifica el JSON de description
        $descriptionData = json_decode($description, true);

        if($descriptionData !== null) {
            $precio = $descriptionData['precio'];
            $unidades = $descriptionData['unidades'];
            $modelo = $descriptionData['modelo'];
            $marca = $descriptionData['marca'];
            $detalles = $descriptionData['detalles'];
            $imagen = $descriptionData['imagen'];

            $query = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) 
                      VALUES ('$name', '$marca', '$modelo', '$precio', '$detalles', '$unidades', '$imagen')";

            $result = mysqli_query($conexion, $query); 
            if(!$result){
                die('La consulta falló'); 
            }
            echo 'Producto añadido correctamente'; 
        } else {
            echo 'Error al decodificar el JSON de description'; 
        }
    }
?>
