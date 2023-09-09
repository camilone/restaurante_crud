<?php
function agregarMenu($menu,$rest,$qr,$ruta)
{
// Replace these values with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
{
   die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO menu VALUES ('','".$menu."','".$rest."','".$qr."','".$ruta."')";
$result = mysqli_query($conn, $sql);
	
mysqli_close($conn);

}

function borrarMenu($id)
{
// Replace these values with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
{
   die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM menu WHERE restaurant = ".$id."";
$result = mysqli_query($conn, $sql);
	
mysqli_close($conn);	
}

function actualizarMenu($id,$menu,$rest,$rutaMenu,$qr)
{
// Replace these values with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
{
   die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE menu SET nombre = '".$menu."', restaurant = '".$rest."', menu_restaurant = '".$rutaMenu."', qr_restaurant = '".$qr."' WHERE id = ".$id."";
$result = mysqli_query($conn, $sql);
	
mysqli_close($conn);
}

function obtenerRestaurant()
{
// Replace these values with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
{
   die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, nombre FROM restaurant";
$result = mysqli_query($conn, $sql);
	
mysqli_close($conn);

return $result;
}
?>