<?php
$imagen   = 'img/imagen.png';

/** SE CREA EL OBJETO DE CONEXION */
@$link = new mysqli('localhost', 'root', 'andrei2703', 'marketzone');	

/** comprobar la conexión */
if ($link->connect_errno) 
{
    die('Falló la conexión: '.$link->connect_error.'<br/>');
    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
}
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nombre = $_POST['name'];
    $marca = $_POST['brand'];
    $modelo = $_POST['model'];
    $precio = $_POST['price'];
    $descripcion = $_POST['description'];
    $unidades = $_POST['unit'];
 }

 $sql = "SELECT * FROM productos WHERE nombre = '$nombre' AND marca = '$marca' AND modelo = '$modelo'";
 $result = $link->query($sql);

 if($result->num_rows > 0){
    echo "ERROR, YA ESTÁ DADO DE ALTA ESTE PRODUCTO";
 }else {

/** Crear una tabla que no devuelve un conjunto de resultados */

//$sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$descripcion}', {$unidades}, '{$imagen}')";
$sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles ,unidades) VALUES ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$descripcion}', {$unidades})";
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
	echo 'El Producto no pudo ser insertado =(';
}
 }


$link->close();
?>