<?php
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-5">
<h1>Borrar Menú</h1>
<br>
  <form id="borrar" action="Controladores/borrarMenu.php" method="POST" onsubmit="return confirm('Estás seguro que quieres borrar este menú?');">
    <div class="mb-3">
      <label for="inputEmail" class="form-label">Restaurant</label>
    <select id="id" name="id" class="form-select" required>
      <option value="">Selecciona...</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Borrar</button>
	<a href="http://localhost/CRUD/"><button type="button" class="btn btn-primary">Volver</button></a>
  </form>
</div>

  <script>
    $(document).ready(function() {
      // Function to load data using AJAX
      function loadData() {
        $.ajax({
          url: "Conexion/listaMenu.php", // The PHP file to fetch data
          type: "GET",
          dataType: "json",
          success: function(data) {
            var selectOptions = "";
            $.each(data, function(index, item) {
              selectOptions += '<option value="' + item.id + '">' + item.nombre + '</option>';
            });
            $("#id").append(selectOptions); // Populate the Select with options
          },
          error: function(xhr, status, error) {
            console.error(error);
          }
        });
      }

      // Load data initially
      loadData();
      
      // Optionally, you can refresh the data every few seconds
      // setInterval(loadData, 5000); // Refresh data every 5 seconds
    });
  </script>

</body>
</html>