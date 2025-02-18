<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
    <title>Práctica 4</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar, $_7var, myvar, $myvar, $var7, $_element1, $house*5</p>
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
        echo '<li>myvar es inválida porque no tiene el signo de dólar ($).</li>';
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

    echo '<p>' . $a . '</p>';
    echo '<p>' . $b . '</p>';
    echo '<p>' . $c . '</p>';

    $a = "PHP Server";
    $b = &$a;

    echo '<p>' . $a . '</p>';
    echo '<p>' . $b . '</p>';
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
    echo '<p>$a: ' . $a . '</p>';
    $z[] = &$a;
    echo '<p>$z: ';
    print_r($z);
    echo '</p>';
    $b = "5a version de PHP";
    echo '<p>$b: ' . $b . '</p>';
    $c = $b*10;
    echo '<p>$c: ' . $c . '</p>';
    $a .= $b;
    echo '<p>$a: ' . $a . '</p>';
    $b *= $c;
    echo '<p>$b: ' . $b . '</p>';
    $z[0] = "MySQL";
    echo '<p>$z[0]: ';
    print_r($z[0]);
    echo '</p>';

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
    echo "<div>Valor de \$a: " . $GLOBALS['a'] . "</div>";
    $z[] = &$a;
    echo "<div>Valor de \$z[0]: " . $GLOBALS['z'][0] . "</div>";
    $b = "5a version de PHP";
    echo "<div>Valor de \$b: " . $GLOBALS['b'] . "</div>";
    @$c = $b * 10;
    echo "<div>Valor de \$c: " . $GLOBALS['c'] . "</div>";
    $a .= $b;
    echo "<div>Nuevo valor de \$a: " . $GLOBALS['a'] . "</div>";
    @$b *= $c;
    echo "<div>Nuevo valor de \$b: " . $GLOBALS['b'] . "</div>";
    $z[0] = "MySQL";
    echo "<div>Nuevo valor de \$z[0]: " . $GLOBALS['z'][0] . "</div>";
    echo "<pre>";
    print_r($GLOBALS['z']);
    echo "</pre>";

    unset($a);
    unset($z);
    unset($b);
    unset($c);
    ?>

    <h2>Ejercicio 5</h2>
    <p>Dar el valor de las variables $a, $b, $c al final del script.</p>
    <?php

    $a = "7 personas";
    echo '<p>El valor que tomará $a es de: ' . $a . '</p>';

    $b = (integer) $a;
    $a = "9E3";
    echo '<p>El valor que tomará $a es de: ' . $a . '</p>';
    $c = (double) $a;

    $b = 7;
    echo '<p>El valor que tomará $b es de: ' . $b . '</p>';

    $c = 9000.0;
    echo '<p>El valor que tomará $c es de: ' . $c . '</p>';

    unset($a);
    unset($b);
    unset($c);
    ?>

    <h2>Ejercicio 6</h2>
    <p>Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas
    usando la función "var_dump(datos).</p>
    <?php
    $a = "0";
    $b = "TRUE";
    $c = FALSE;
    $d = ($a OR $b);
    $e = ($a AND $c);
    $f = ($a XOR $b);

    echo '<p>$a: ';
    var_dump((bool) $a);
    echo '</p>';
    echo '<p>$b: ';
    var_dump((bool) $b);
    echo '</p>';
    echo '<p>$c: ';
    var_dump((bool) $c);
    echo '</p>';
    echo '<p>$d: ';
    var_dump((bool) $d);
    echo '</p>';
    echo '<p>$e: ';
    var_dump((bool) $e);
    echo '</p>';
    echo '<p>$f: ';
    var_dump((bool) $f);
    echo '</p>';

    echo '<p>Transformar en un valor booleano los incisos $c y $e</p>';
    echo '<p>$c: ';
    echo var_export($c, true);
    echo '</p>';
    echo '<p>$e: ';
    echo var_export($e, true);
    echo '</p>';

    unset($a);
    unset($b);
    unset($c);
    unset($d);
    unset($e);
    unset($f);
    ?>

    <h2>Ejercicio 7</h2>
    <p>Variable predefinida $_SERVER</p>
    <?php
    //Versión de Apache y PHP
    echo '<p>Versión de Apache: ' . $_SERVER['SERVER_SOFTWARE'] . '</p>';
    echo '<p>Versión de PHP: ' . phpversion() . '</p>';

    //Nombre del sistema operativo (servidor)
    echo '<p>Sistema Operativo del servidor: ' . php_uname() . '</p>';

    //Idioma del navegador
    echo '<p>Idioma del navegador: ' . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . '</p>';
    ?>

    <p>
    <a href="https://validator.w3.org/markup/check?uri=referer"><img
      src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
    </p>
</body>
</html>
