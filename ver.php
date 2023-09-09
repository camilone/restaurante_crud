<?php
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Add Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <!-- Add DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">

  <!-- Add jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Add DataTables JS -->
  <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
</head>
<body>
  <div class="container mt-5">
  <h1>Ver Menú</h1>
  <br>
    <table id="myTable" class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Restaurant</th>
		  <th>Menú</th>
		  <th>Código QR</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
	
	<a href="http://localhost/CRUD/"><button type="button" class="btn btn-primary">Volver</button></a>
	
  </div>
  
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable({
        "ajax": "Conexion/mostrarMenu.php", // Load data from data.php using AJAX
        "columns": [
          { "data": "id" },
          { "data": "nombre" },
          { "data": "restaurant" },
		  { "data": "menu" },
		  { "data": "qr" }
        ]
      });
    });
  </script>
</body>
</html>
