<?php
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

function obtenerMenu()
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

$sql = "SELECT m.id AS id_menu, m.nombre AS nombre_menu, r.id AS id_restaurant, r.nombre AS nombre_restaurant, m.menu_restaurant AS menu_restaurant, m.qr_restaurant AS qr_restaurant FROM menu m INNER JOIN restaurant r ON r.id = m.restaurant";
$result = mysqli_query($conn, $sql);
	
mysqli_close($conn);

return $result;
}

function eliminarMenu($id)
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

?>
