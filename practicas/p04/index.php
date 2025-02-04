<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 4</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        $_myvar;
        $_7var;
        $myvar;
        $var7;
        $_element1;
        echo '<h4>Respuesta:</h4>';   
        echo '<ul>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>myvar es inválida porque no tiene el signo de dolar ($).</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido.</li>';
        echo '</ul>';

        unset($_myvar);
        unset($_7var);
        unset($_element1);
        unset($myvar);
        unset($var7);
    ?>
    
    <h2>Ejercicio 2</h2>
    <p>Proporcionar los valores de $a, $b, $c</p>
    <?php
    $a = "Manejador SQL"; 
    $b = 'MySQL';
    $c = &$a;

    echo $a . '<br>';
    echo $b . '<br>';
    echo $c . '<br>';
    echo '<br>'; 

    $a = "PHP Server"; 
    $b = &$a; 

    echo $a . "<br>";
    echo $b . "<br>";
    unset($a);
    unset($b);
    unset($c);
    ?>

    <h2>Ejercicio 3</h2>
    <p>Muestra el contenido de cada variable inmediatamente después de cada asignación,
    verificar la evolución del tipo de estas variables</p>
    <?php
    error_reporting(0);
    $a = "PHP5";
    echo "\$a: ";
    echo $a . "<br>";
    $z[] = &$a;
    echo "\$z: ";
    print_r($z);
    echo "<br>"; 
    $b = "5a version de PHP"; 
    echo "\$b: ";
    echo $b . "<br>";
    $c = $b*10;
    echo "\$c: ";
    echo $c . "<br>";
    $a .= $b;
    echo "\$a: ";
    echo $a . "<br>";
    $b *= $c;
    echo "\$b: ";
    echo $b . "<br>";
    $z[0] = "MySQL";
    echo "\$z[0]: ";
    print_r( $z[0] );
    ?>
</body>
</html>