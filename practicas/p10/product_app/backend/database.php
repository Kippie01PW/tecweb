<?php
    @$link = new mysqli('localhost', 'root', 'andrei2703', 'marketzone');
    $conexion = @$link; 
    /**
     * NOTA: si la conexión falló $conexion contendrá false
     **/
    if(!$conexion) {
        die('¡Base de datos NO conextada!');
    }
?>