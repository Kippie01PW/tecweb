<?php

/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', 'andrei2703', 'marketzone');	

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id']; 
    $nombre = $_POST['name'];
    $marca = $_POST['brand'];
    $modelo = $_POST['model'];
    $precio = $_POST['price'];
    $descripcion = $_POST['description'];
    $unidades = $_POST['unit'];
    $imagen = $_POST['imagen']; 
 }

$sql = "UPDATE productos SET 
        nombre = '{$nombre}', 
        marca = '{$marca}', 
        modelo = '{$modelo}', 
        precio = {$precio}, 
        detalles = '{$descripcion}', 
        unidades = {$unidades}, 
        imagen = '{$imagen}'
      WHERE id = {$id}";


if ( $link->query($sql) ) 
{
    echo 'Producto insertado con ID: '.$link->insert_id;
    echo "<ul>
        <li>Nombre del producto: $nombre</li>
        <li>Marca del producto: $marca</li>
        <li>Modelo del producto: $modelo</li>
        <li>Precio del producto: $precio</li>
        <li>Detalles del producto: $descripcion</li>
        <li>Unidades del producto: $unidades</li>
        </ul>";
}
else
{
	echo 'El Producto no pudo ser actualizado =(';
}

echo 'Verifica la actualización de la tabla con los siguientes enlaces: '; 

$textoEnlace = "Haz clic aquí";
$urlEnlace = "http://localhost/tecweb/practicas/p09/get_productos_vigentes_v2.php";
$urlEnlace2 = "http://localhost/tecweb/practicas/p09/get_productos_xhtml_v2.php";

// Usando echo
echo '<a href="' . $urlEnlace . '">' . $textoEnlace . '</a>';
echo '<br>'; 
// Usando print
echo '<a href="' . $urlEnlace2 . '">' . $textoEnlace . '</a>';



$link->close();
?>