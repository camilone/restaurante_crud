<?php
require("../Conexion/conexion.php");

$id   = $_POST['idAct'];
$menu = $_POST['nombre'];
$rest = $_POST['idRestaurant'];
$desc = $_POST['desc'];

actualizarMenu($id,$menu,$rest,$desc);

header("Location: http://localhost/CRUD/index.php");

?>