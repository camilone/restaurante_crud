<?php
require("../Conexion/conexion.php");

$id = $_POST['id'];

borrarMenu($id);

header("Location: http://localhost/CRUD/index.php");

?>