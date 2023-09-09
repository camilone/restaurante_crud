<?php
require('../Conexion/conexion.php');

$listaRest = obtenerRestaurant();

if ($listaRest != '')
{
	$restaurant = "";
	while ($rowRest = mysqli_fetch_assoc($listaRest))
	{
		if($rowRest['id'] != "")
		{
			$opcion = "<option value=''>Selecciona una opción</option>";
			$restaurant .="<option value=".$rowRest['id'].">Restaurant: ".$rowRest['nombre']."</option>"; //Combo que contiene info del titular cuando no tiene cargas.
		}
	}
}

$restaurant = $opcion.$restaurant;
$respuesta = array("restaurant"=>$restaurant);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($respuesta);
exit();