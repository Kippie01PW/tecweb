<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
    require_once __DIR__ .'/src/funciones.php';
        if(isset($_GET['numero']))
        {
            es_multiplo7y5($_GET['numero']);
        }
    ?>

    <h2>Ejercicio 2</h2>
    <p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una
    secuencia compuesta</p>
    <?php 
    require_once __DIR__ .'/src/funciones.php';
        generacion_repetitiva(); 
    ?>

    <h2>Ejercicio 3</h2>
    <p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente,
    pero que además sea múltiplo de un número dado.</p>
    <p>Para que aparezca la función debes colocar esto en la barra de navegación <b>"?num="numero que tu quieras""</b></p>
    <?php
    require_once __DIR__ .'/src/funciones.php';
    if(isset($_GET['num'])){
        num_multiplo_dado($_GET['num']); 

        echo '<br>'; 
        echo '<p>La función de abajo es la misma función de arriba pero ahora con un do while!!</p>'; 
        num_multiplo_dado_variante($_GET['num']); 
    }
    ?>

    <h2>Ejercicio 4</h2>
    <p>Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la 'a'
    a la 'z'.</p>
    <?php
    require_once __DIR__ .'/src/funciones.php';
        arreglo_for(); 
    ?>

    <h2>Ejercicio 5</h2>
    <p>Realización de formulario </p>

    <form action="http://localhost/tecweb/practicas/p06/src/xhtml1.php" method="post">
        <fieldset>
            <legend>Información para acceder: </legend>

            <label for="edad">Edad: </label><input type="number" name="edad" required>
            <label for="sexo">Sexo: </label>
            <select name="sexo" id="sexo" required>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option> 
            </select>
        </fieldset>
        <input type="submit" value="Enviar">
    </form>

    <h2>Registro de parque vehicular</h2>

    <form action="http://localhost/tecweb/practicas/p06/src/funciones.php" method="POST">
        <fieldset>
            <legend>Consulta</legend>
            <label for="matricula">Matrícula del vehículo:</label>
            <input type="text" id="matricula" name="matricula" placeholder="Ej. ABC1234" required>
            <button type="submit">Consultar</button>
        </fieldset>
    </form>
    <br>
    <form action="http://localhost/tecweb/practicas/p06/src/funciones.php" method="POST">
        <button type="submit" name="todos_los_vehiculos">Mostrar vehículos registrados</button>
    </form>

</body>
</html>