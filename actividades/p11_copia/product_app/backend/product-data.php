<?php
    include_once __DIR__.'/database.php';

    /**
     * ESTE ARCHIVO REALIZA LA CONSULTA QUE VERIFICA SI EXISTE UN PRODUCTO CON EL MISMO NOMBRE
     * QUE EL USUARIO ESCRIBIÓ EN EL CAMPO DE NOMBRE, SI SE ENCUENTRA YA EN LA BASE DE DATOS SE OBTENDRÁ 
     * EL JSON Y MEDIANTE UN CONDICIONAL EN JS SI HAY 1 O MÁS DATOS ES SIGNIFICADO DE QUE YA EXISTE EN LA 
     * BASE DE DATOS
     */
    $data = array();
    if( isset($_GET['search']) ) {
        $search = $_GET['search'];
        $sql = "SELECT * FROM productos WHERE nombre = '{$search}' AND eliminado = 0";
        if ( $result = $conexion->query($sql) ) {
			$rows = $result->fetch_all(MYSQLI_ASSOC);

            if(!is_null($rows)) {
                foreach($rows as $num => $row) {
                    foreach($row as $key => $value) {
                        $data[$num][$key] = utf8_encode($value);
                    }
                }
            }
			$result->free();
		} else {
            die('Query Error: '.mysqli_error($conexion));
        }
		$conexion->close();
    } 
    echo json_encode($data, JSON_PRETTY_PRINT);
?>