<?php
require('Funciones/FuncionesApp.php');

$json = listadoMenu();
header('Content-Type: application/json');
print_r($json);