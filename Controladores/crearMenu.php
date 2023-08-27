<?php
require("../Conexion/conexion.php");

$menu = $_POST['nombre'];
$rest = $_POST['idRestaurant'];
$desc = $_POST['desc'];

agregarMenu($menu,$rest,$desc);

header("Location: http://localhost/CRUD/index.php");

?>