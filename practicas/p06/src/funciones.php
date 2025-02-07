<?php
function es_multiplo7y5($num){
    $num = $_GET['numero']; 
    if ($num%5==0 && $num%7==0)
    {
        echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
    }
    else
    {
        echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
    }
}

function generacion_repetitiva(){ 
    $impar1 = 0; 
    $par =  0; 
    $impar2 = 0;
    $contador = 0; 

    while (($impar1%2)==0 || ($par%2)!=0 ||($impar2%2)== 0){
        global $impar1;
        global $par;
        global $impar2;
        global $contador;

        $impar1 = rand(100,999);
        $par = rand(100,999);
        $impar2 = rand(100,999);

        $contador++; 
    }
    $matriz = array(); 
    $matriz [0] = $impar1;
    $matriz [1] = $par;
    $matriz [2] = $impar2;

    echo 'Se obtuvo la siguiente combinación que cumple satisfactoriamente: '; 
    for($i=0; $i<3; $i++){
        echo $matriz[$i] . ' '; 
    }
    echo 'en: ' . $contador . ' iteraciones' . ' es decir, en: ' . $contador*3 . ' números';
}

function num_multiplo_dado($numero){
    $numero = $_GET['num']; 
    $multiplo = 1; 
    while (($multiplo%$numero)!=0){
    global $multiplo; 

    $multiplo = rand (1, 1000); 
    }
    
    echo 'El numero aleatorio: ' . $multiplo . ' es múltiplo del número que colocaste: ' . $numero; 
}

function num_multiplo_dado_variante($numero){
    $numero = $_GET['num']; 
    $multiplo = 0; 
    do{
    global $multiplo; 

    $multiplo = rand (1, 1000); 
    }while(($multiplo%$numero)!=0); 

    echo 'El numero aleatorio: ' . $multiplo . ' es múltiplo del número que colocaste: ' . $numero; 
}

function arreglo_for(){
    $arreglo = array();

for ($i = 97; $i <= 122; $i++) {
    $arreglo[$i] = chr($i);
}
    echo '<table border="1">';
    echo '<tr><th>Índice</th><th>Valor</th></tr>';

foreach ($arreglo as $key => $value) {
    echo '<tr>';
    echo '<td>' . $key . '</td>';
    echo '<td>' . $value . '</td>';
    echo '</tr>';
}
    echo '</table>';
}


//Ejercicio 6
$parque_vehicular = array(
    "ABC1234" => array(
        "auto" => array(
            "marca" => "Toyota",
            "modelo" => "Corolla",
            "año" => 2020,
            "tipo" => "sedan"
        ),
        "propietario" => array(
            "nombre" => "Juan Pérez",
            "ciudad" => "Ciudad de México",
            "direccion" => "Av. Reforma 123"
        )
    ),
    "DEF5678" => array(
        "auto" => array(
            "marca" => "Honda",
            "modelo" => "Civic",
            "año" => 2021,
            "tipo" => "sedan"
        ),
        "propietario" => array(
            "nombre" => "Ana López",
            "ciudad" => "Monterrey",
            "direccion" => "Calle Juárez 456"
        )
    ),
    "GHI9012" => array(
        "auto" => array(
            "marca" => "Ford",
            "modelo" => "Focus",
            "año" => 2019,
            "tipo" => "hatchback"
        ),
        "propietario" => array(
            "nombre" => "Carlos Martínez",
            "ciudad" => "Guadalajara",
            "direccion" => "Calle 5 de Febrero 789"
        )
    ),
    "JKL3456" => array(
        "auto" => array(
            "marca" => "Chevrolet",
            "modelo" => "Equinox",
            "año" => 2022,
            "tipo" => "camioneta"
        ),
        "propietario" => array(
            "nombre" => "Sofía García",
            "ciudad" => "Puebla",
            "direccion" => "Avenida 20 de Noviembre 101"
        )
    ),
    "MNO7890" => array(
        "auto" => array(
            "marca" => "Nissan",
            "modelo" => "Altima",
            "año" => 2018,
            "tipo" => "sedan"
        ),
        "propietario" => array(
            "nombre" => "Luis Rodríguez",
            "ciudad" => "Cancún",
            "direccion" => "Calle del Mar 321"
        )
    ),
    "PQR1234" => array(
        "auto" => array(
            "marca" => "Mazda",
            "modelo" => "CX-5",
            "año" => 2023,
            "tipo" => "camioneta"
        ),
        "propietario" => array(
            "nombre" => "María Sánchez",
            "ciudad" => "Tijuana",
            "direccion" => "Calle Larga 654"
        )
    ),
    "STU5678" => array(
        "auto" => array(
            "marca" => "Volkswagen",
            "modelo" => "Golf",
            "año" => 2020,
            "tipo" => "hatchback"
        ),
        "propietario" => array(
            "nombre" => "Ricardo Fernández",
            "ciudad" => "Querétaro",
            "direccion" => "Avenida Independencia 111"
        )
    ),
    "VWX9012" => array(
        "auto" => array(
            "marca" => "Hyundai",
            "modelo" => "Elantra",
            "año" => 2021,
            "tipo" => "sedan"
        ),
        "propietario" => array(
            "nombre" => "Patricia Díaz",
            "ciudad" => "Chihuahua",
            "direccion" => "Calle de la Paz 232"
        )
    ),
    "YZA3456" => array(
        "auto" => array(
            "marca" => "Kia",
            "modelo" => "Seltos",
            "año" => 2022,
            "tipo" => "camioneta"
        ),
        "propietario" => array(
            "nombre" => "Alberto Gómez",
            "ciudad" => "Veracruz",
            "direccion" => "Avenida Las Américas 987"
        )
    ),
    "BCD7890" => array(
        "auto" => array(
            "marca" => "Mazda",
            "modelo" => "Mazda3",
            "año" => 2020,
            "tipo" => "hatchback"
        ),
        "propietario" => array(
            "nombre" => "Juliana Martínez",
            "ciudad" => "Aguascalientes",
            "direccion" => "Calle del Sol 332"
        )
    ),
    "EFG1234" => array(
        "auto" => array(
            "marca" => "Ford",
            "modelo" => "Mustang",
            "año" => 2023,
            "tipo" => "sedan"
        ),
        "propietario" => array(
            "nombre" => "Eduardo Pérez",
            "ciudad" => "León",
            "direccion" => "Calle Centenario 543"
        )
    ),
    "HIJ5678" => array(
        "auto" => array(
            "marca" => "BMW",
            "modelo" => "X5",
            "año" => 2021,
            "tipo" => "camioneta"
        ),
        "propietario" => array(
            "nombre" => "Carlos Ortega",
            "ciudad" => "San Luis Potosí",
            "direccion" => "Avenida México 345"
        )
    ),
    "KLM9012" => array(
        "auto" => array(
            "marca" => "Audi",
            "modelo" => "A4",
            "año" => 2020,
            "tipo" => "sedan"
        ),
        "propietario" => array(
            "nombre" => "Daniela Ríos",
            "ciudad" => "Toluca",
            "direccion" => "Calle Libertad 678"
        )
    ),
    "NOP3456" => array(
        "auto" => array(
            "marca" => "Chevrolet",
            "modelo" => "Cruze",
            "año" => 2022,
            "tipo" => "sedan"
        ),
        "propietario" => array(
            "nombre" => "Francisco García",
            "ciudad" => "Morelia",
            "direccion" => "Calle Guerrero 101"
        )
    ),
    "QRS7890" => array(
        "auto" => array(
            "marca" => "Nissan",
            "modelo" => "370Z",
            "año" => 2019,
            "tipo" => "sedan"
        ),
        "propietario" => array(
            "nombre" => "Susana Ramírez",
            "ciudad" => "Culiacán",
            "direccion" => "Calle México 202"
        )
    ),
    "TUV1234" => array(
        "auto" => array(
            "marca" => "Hyundai",
            "modelo" => "Santa Fe",
            "año" => 2023,
            "tipo" => "camioneta"
        ),
        "propietario" => array(
            "nombre" => "Esteban Hernández",
            "ciudad" => "Mérida",
            "direccion" => "Calle 60 876"
        )
    )
);

function mostrar_auto($matricula) {
    global $parque_vehicular;

    if (isset($parque_vehicular[$matricula])) {
        $vehiculo = $parque_vehicular[$matricula];
        echo "<h2>Información del vehículo $matricula:</h2>";
        echo "<b>Marca: </b>" . $vehiculo["auto"]["marca"] . "<br>";
        echo "<b>Modelo: </b>" . $vehiculo["auto"]["modelo"] . "<br>";
        echo "<b>Año: </b>" . $vehiculo["auto"]["año"] . "<br>";
        echo "<b>Tipo: </b>" . $vehiculo["auto"]["tipo"] . "<br>";
        echo "<b>Propietario: </b>" . $vehiculo["propietario"]["nombre"] . "<br>";
        echo "<b>Ciudad: </b>" . $vehiculo["propietario"]["ciudad"] . "<br>";
        echo "<b>Dirección: </b>" . $vehiculo["propietario"]["direccion"] . "<br>";
    } else {
        echo "<p>No se encontró un vehículo con esa matrícula</p>";
    }
}

function mostrar_todos_los_vehiculos() {
    global $parque_vehicular;
    echo "<h2>Todos los vehículos registrados:</h2>";
    foreach ($parque_vehicular as $matricula => $vehiculo) {
        echo "<b>Matricula: </b> $matricula <br>";
        echo "<b>Marca: </b>" . $vehiculo["auto"]["marca"] . "<br>";
        echo "<b>Modelo: </b>" . $vehiculo["auto"]["modelo"] . "<br>";
        echo "<b>Año: </b>" . $vehiculo["auto"]["año"] . "<br>";
        echo "<b>Tipo: </b>" . $vehiculo["auto"]["tipo"] . "<br>";
        echo "<b>Propietario: </b>" . $vehiculo["propietario"]["nombre"] . "<br>";
        echo "<b>Ciudad: </b>" . $vehiculo["propietario"]["ciudad"] . "<br>";
        echo "<b>Dirección: </b>" . $vehiculo["propietario"]["direccion"] . "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["matricula"])) {
        $matricula = $_POST["matricula"];
        mostrar_auto($matricula);
    } elseif (isset($_POST["todos_los_vehiculos"])) {
        mostrar_todos_los_vehiculos();
    }
}
?>