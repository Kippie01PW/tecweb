<?php
    @$link = new mysqli('localhost', 'root', 'andrei2703', 'marketzone');
    $conn = @$link; 
    /**
     * NOTA: si la conexión falló $conexion contendrá false
     **/
    if(!$conn) {
        die('¡Base de datos NO conextada!');
    }
?>