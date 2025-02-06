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
?>