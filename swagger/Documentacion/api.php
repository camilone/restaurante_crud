<?php
error_reporting(0);
require("../swagger-generator/vendor/autoload.php");
/*
$openapi = \Swagger\scan(['/var/www/html/PortalSermecoop/apiRest_desa/Funciones/']);
header('Content-Type: application/json');
echo $openapi->toJSON();
*/

$openapi = \Swagger\scan(['C:\xampp\htdocs\CRUD\swagger\Funciones/FuncionesApp.php']);
header('Content-Type: application/json');
echo $openapi;