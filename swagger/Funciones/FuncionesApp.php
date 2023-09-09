<?php
/**
 * @SWG\Info(title="Editor de Menú", version="1.0.0")
 */
require('Conexion/Conexion.php');


/**
 * @SWG\Get(
 *		 path="/CRUD/swagger/listadoRestaurant.php", 
 *		 tags={"Endpoint"},
 *     summary="Consulta listado de restaurantes",
 *		 consumes={"application/json"},
 *		 produces={"application/json"},
 *
 * 
 *     @SWG\Response(response="200", description="Correcto."),
 *     @SWG\Response(response="404", description="Not found.")
 * )
 */
function listadoRestaurant()
{
	$data = obtenerRestaurant();
	while($registro = mysqli_fetch_assoc($data))
	{
		$datos[] = $registro;
	}
	
	$cod = 1;
	$res = "Correcto";
	
	$data = array("Codigo" => $cod, "Respuesta" => $res, "Datos" => $datos);
	$json = json_encode($data);
	
	return $json;
}

/**
 * @SWG\Get(
 *		 path="/CRUD/swagger/listadoMenu.php", 
 *		 tags={"Endpoint"},
 *     summary="Consulta listado de Menus disponibles",
 *		 consumes={"application/json"},
 *		 produces={"application/json"},
 *
 * 
 *     @SWG\Response(response="200", description="Correcto."),
 *     @SWG\Response(response="404", description="Not found.")
 * )
 */
function listadoMenu()
{
	$data = obtenerMenu();
	while($registro = mysqli_fetch_assoc($data))
	{
		$datos[] = $registro;
	}
	
	$cod = 1;
	$res = "Correcto";
	
	$data = array("Codigo" => $cod, "Respuesta" => $res, "Datos" => $datos);
	$json = json_encode($data);
	
	return $json;
}

/**
 * @SWG\Post(
 *		 path="/CRUD/swagger/creacionMenu.php", 
 *		 tags={"Endpoint"},
 *     summary="Creación de Menus",
 *		 consumes={"application/json"},
 *		 produces={"application/json"},
 *
 * @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     description="",
 *     required=true,
 *
 *     @SWG\Schema(
 *        type="object",
 *               @SWG\Property(property="nombre", type="string"),
 *               @SWG\Property(property="idRestaurant", type="string"),
 * 				       @SWG\Property(property="documento", type="array",
 *       				 @SWG\Items(
 *         			 @SWG\Property(type="string",property="archivoBase64",description="ID"),
 *      )
 *   ),
 *
 * 		)
 * ),
 * 
 *     @SWG\Response(response="200", description="Correcto."),
 *     @SWG\Response(response="404", description="Not found.")
 * )
 */
function ingresoMenu($menu,$rest,$archivoBase64)
{
	$nombreArchivo = base64_decode($archivoBase64);

	$directorio = "../Outfile/".$rest."/";
	$ruta = "../Outfile/".$rest."/".$nombreArchivo;

	if (!file_exists($directorio))
	{
		mkdir($directorio, 0777);
	}

	if(!file_exists($ruta))
	{	
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
			agregarMenu($menu,$rest,$qr,$rutaMenu);		
		}	
	}
	
	$cod = 1;
	$res = "Correcto";
	
	$data = array("Codigo" => $cod, "Respuesta" => $res);
	$json = json_encode($data);
	
	return $json;
}

/**
 * @SWG\Post(
 *		 path="/CRUD/swagger/actualizarMenu.php", 
 *		 tags={"Endpoint"},
 *     summary="Actualizacion de Menus",
 *		 consumes={"application/json"},
 *		 produces={"application/json"},
 *
 * @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     description="",
 *     required=true,
 *
 *     @SWG\Schema(
 *        type="object",
 *               @SWG\Property(property="id_act", type="string"),
 *               @SWG\Property(property="nombre", type="string"),
 *               @SWG\Property(property="idRestaurant", type="string"),
 * 				       @SWG\Property(property="documento", type="array",
 *       				 @SWG\Items(
 *         			 @SWG\Property(type="string",property="archivoBase64",description="ID"),
 *      )
 *   ),
 *
 * 		)
 * ),
 * 
 *     @SWG\Response(response="200", description="Correcto."),
 *     @SWG\Response(response="404", description="Not found.")
 * )
 */
function actualizarMenu($menu_act,$menu,$rest,$archivoBase64)
{
	$nombreArchivo = base64_decode($archivoBase64);

	$directorio = "../Outfile/".$rest."/";
	$ruta = "../Outfile/".$rest."/".$nombreArchivo;

	if (!file_exists($directorio))
	{
		mkdir($directorio, 0777);
	}

	if(!file_exists($ruta))
	{	
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
			agregarMenu($menu,$rest,$qr,$rutaMenu);		
		}
	}
	
	$cod = 1;
	$res = "Correcto";
	
	$data = array("Codigo" => $cod, "Respuesta" => $res);
	$json = json_encode($data);
	
	return $json;	
}

/**
 * @SWG\Post(
 *		 path="/CRUD/swagger/borrarMenu.php", 
 *		 tags={"Endpoint"},
 *     summary="Actualizacion de Menus",
 *		 consumes={"application/json"},
 *		 produces={"application/json"},
 *
 * @SWG\Parameter(
 *     name="body",
 *     in="body",
 *     description="",
 *     required=true,
 *
 *     @SWG\Schema(
 *        type="object",
 *               @SWG\Property(property="id", type="string")
 *      )
 *   ),
 *
 * 		)
 * ),
 * 
 *     @SWG\Response(response="200", description="Correcto."),
 *     @SWG\Response(response="404", description="Not found.")
 * )
 */
function borrarMenus($id)
{
	eliminarMenu($id);
	
	$cod = 1;
	$res = "Correcto";
	
	$data = array("Codigo" => $cod, "Respuesta" => $res);
	$json = json_encode($data);
	
	return $json;
	
}
?>