<?php
require('Funciones/FuncionesApp.php');

$json = listadoRestaurant();
header('Content-Type: application/json');
print_r($json);