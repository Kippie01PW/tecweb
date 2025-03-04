<?php
    @$link = new mysqli('localhost', 'root', 'andrei2703', 'marketzone');
    $conn = @$link; 
    if(!$conn) {
        die('¡Base de datos NO conextada!');
    }
?>