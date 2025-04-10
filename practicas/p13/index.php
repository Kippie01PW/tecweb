<?php 
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require 'vendor/autoload.php';


$app = AppFactory::create();
///myapp/api is the api folder http://domain/myapp/api/
$app->setBasepath("/tecweb/practicas/p13");

$app->get('/', function ($request, $response, $args) {
    $response->getBody()->write("Hola Mundo!!!");
    return $response;
});

$app->get("/saluda[/{nombre}]", function($request, $response, $args){
    $response->getBody()->write("Hola, " . $args["nombre"]);
    return $response; 
});

$app->post("/pruebapost", function($request, $response, $args){
    $reqPost = $request->getParsedBody();
    $val1 = $reqPost["val1"]; 
    $val2 = $reqPost["val2"]; 

    $response->getBody()->write("Valores: " . $val1 . " " . $val2);
    return $response; 
});

$app->get("/testjson", function($request, $response, $args){
    $data[0]["nombre"]="Andrei"; 
    $data[0]["apellidos"]="Carro Flores"; 
    $data[1]["nombre"]="Juan Carlos"; 
    $data[1]["apellidos"]="Conde Ramirez"; 

    $response->getBody()->write(json_encode($data, JSON_PRETTY_PRINT));
    return $response; 
});

$app->run(); 
?>