<?php
    include_once __DIR__.'/database.php';

    $id = $_POST['id']; 
    $name = $_POST['name']; 
    $description = $_POST['description']; 

    $descriptionData = json_decode($description, true);

    if ($descriptionData !== null) {
        $precio = $descriptionData['precio'];
        $unidades = $descriptionData['unidades'];
        $modelo = $descriptionData['modelo'];
        $marca = $descriptionData['marca'];
        $detalles = $descriptionData['detalles'];
        $imagen = $descriptionData['imagen'];

        $query = "UPDATE productos SET 
                  nombre = '$name', 
                  marca = '$marca', 
                  modelo = '$modelo', 
                  precio = '$precio', 
                  detalles = '$detalles', 
                  unidades = '$unidades', 
                  imagen = '$imagen' 
                  WHERE id = $id"; 

        $result = mysqli_query($conexion, $query); 
        if (!$result) {
            die('Consulta fallida'); 
        }

        echo "Producto actualizado satisfactoriamente";
    } else {
        echo 'Error al decodificar el JSON de description';
    }
?>
