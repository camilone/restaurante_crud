<?php
function agregarMenu($menu,$rest,$desc)
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

$sql = "INSERT INTO menu VALUES ('','".$menu."','".$rest."','".$desc."')";
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

$sql = "DELETE FROM menu WHERE id = ".$id."";
$result = mysqli_query($conn, $sql);
	
mysqli_close($conn);	
}

function actualizarMenu($id,$menu,$rest,$desc)
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

$sql = "UPDATE menu SET nombre = '".$menu."', restaurant = '".$rest."', descripcion = '".$desc."' WHERE id = ".$id."";
$result = mysqli_query($conn, $sql);
	
mysqli_close($conn);	
}
?>