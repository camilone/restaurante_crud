<?php
require("../Conexion/conexion.php");
require('../Librerias/codigo_qr/phpqrcode/qrlib.php');

$id   = $_POST['idAct'];
$menu = $_POST['nombre'];
$rest = $_POST['idRestaurant'];

$nombreArchivo = $_FILES['archivoMenu']['name'];

$directorio = "../Outfile/".$rest."/";
$ruta = "../Outfile/".$rest."/".$nombreArchivo;

if (!file_exists($directorio))
{
  	mkdir($directorio, 0777);
}

if(move_uploaded_file($_FILES['archivoMenu']['tmp_name'], $ruta))
{
	/* CREACION QR */
	$dir = '../Librerias/codigo_qr/temp/';

	//Si no existe la carpeta la creamos
	if (!file_exists($dir))
	{
		mkdir($dir);
	}
	
	//Declaramos la ruta y nombre del archivo a generar
	$filename = $dir.$rest.'.png';

	$tamaño = 10; //Tamaño de Pixel
	$level = 'H'; //Precisión Baja
	$framSize = 1; //Tamaño en blanco
	$contenido = "http://localhost/CRUD/Outfile/".$rest."/".$nombreArchivo.""; /* ESCANER QR */
	$contenido2 = ""; //Texto

	//Enviamos los parametros a la Función para generar código QR 
	QRcode::png($contenido, $filename, $level, $tamaño, $framSize);
		
	$rutaMenu = "http://localhost/CRUD/Outfile/".$rest."/".$nombreArchivo."";
	$qr = "http://localhost/CRUD/Librerias/codigo_qr/temp/".$rest.".png";
	actualizarMenu($id,$menu,$rest,$rutaMenu,$qr);
}


header("Location: http://localhost/CRUD/index.php");

?>