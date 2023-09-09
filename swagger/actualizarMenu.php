<?php
require('Funciones/FuncionesApp.php');

$data = json_decode(file_get_contents('php://input'), true);

$menu_act = $data['id_act'];
$menu = $data['nombre'];
$rest = $data['idRestaurant'];
$archivoBase64 = $data['documento']['archivoBase64'];


$respuesta = actualizaMenu($menu_act,$menu,$rest,$archivoBase64);

header('Content-Type: application/json');
print_r($respuesta);

?>