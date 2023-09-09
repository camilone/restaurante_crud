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
$sql = "SELECT m.id AS id, 
			   m.nombre AS nombre, 
			   r.nombre AS restaurant, 
			   CONCAT('<img width=150 src=',qr_restaurant,'></img>') AS qr, 
			   CONCAT('<a target=_blank href=',menu_restaurant,'>',menu_restaurant,'</a>') AS menu
		FROM   menu m 
		INNER  JOIN restaurant r ON r.id = m.restaurant";
$result = $conn->query($sql);

// Generate table rows
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
		$data[] = $row;
    }
} else {
    echo "<tr><td colspan='3'>No data available</td></tr>";
}

$conn->close();

header('Content-Type: application/json');
echo json_encode(array("data" => $data));
?>