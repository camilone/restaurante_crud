<?php
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

// Fetch data from the database (example table name: users)
$sql = "SELECT id, nombre, restaurant FROM menu WHERE restaurant = ".$_POST['id']."";
$result = $conn->query($sql);

// Generate table rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
		$id = $row['id'];
		$nombre = $row['nombre'];
		$restaurant = $row['restaurant'];
    }
} else {
    echo "<tr><td colspan='3'>No data available</td></tr>";
}

$conn->close();

$data = array("id"=>$id,"nombre"=>$nombre,"restaurant"=>$restaurant);
header('Content-Type: application/json');
echo json_encode($data);
?>