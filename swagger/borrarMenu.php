<?php
require('Funciones/FuncionesApp.php');

$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'];

$respuesta = borrarMenus($id);

header('Content-Type: application/json');
print_r($respuesta);

?>