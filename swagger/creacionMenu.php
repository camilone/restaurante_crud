<?php
require('Funciones/FuncionesApp.php');

$data = json_decode(file_get_contents('php://input'), true);


$menu = $data['nombre'];
$rest = $data['idRestaurant'];
$archivoBase64 = $data['documento']['archivoBase64'];


$respuesta = ingresoMenu($menu,$rest,$archivoBase64);

header('Content-Type: application/json');
print_r($respuesta);

?>