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

    unset($a);
    unset($z);
    unset($b);
    unset($c);
    ?>

    <h2>Ejercicio 4</h2>
    <p>Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de
    la matriz $GLOBALS o del modificador global de PHP.</p>
    <?php
    global $a, $z, $b, $c;

    $a = "PHP5";
    $z[] = &$a;
    $b = "5a version de PHP";
    $c = $b * 10;
    $a .= $b;
    $b *= $c;
    $z[0] = "MySQL";

    echo "\$GLOBALS['a']: ";
    var_dump($GLOBALS['a']);
    echo "<br>"; 

    echo "\$GLOBALS['z']: ";
    var_dump($GLOBALS['z']);
    echo "<br>"; 

    echo "\$GLOBALS['b']: ";
    var_dump($GLOBALS['b']);
    echo "<br>"; 

    echo "\$GLOBALS['c']: ";
    var_dump($GLOBALS['c']);
    echo "<br>";

    unset($a);
    unset($z);
    unset($b);
    unset($c);
    ?>
    <h2>Ejercicio 5</h2>
    <p>Dar el valor de las variables $a, $b, $c al final del script.</p>
    <?php 

    $a = "7 personas";
    echo "<p>El valor que tomará \$a es de: </p>" . $a; 
    echo "<br>";

    $b = (integer) $a;
    $a = "9E3";
    echo "<p>El valor que tomará \$a es de: </p>" . $a; 
    echo "<br>";
    $c = (double) $a;
;

    $b = 7; 
    echo "<p>El valor que tomará \$b es de: </p>" . $b; 
    echo "<br>";

    $c = 9000.0; 
    echo "<p>El valor que tomará \$c es de: </p>" . $c; 
    echo "<br>";

    unset($a);
    unset($b);
    unset($c);
    ?>
</body>
</html>