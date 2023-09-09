<?php
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
</head>
<body>

<div class="container mt-5">
<h1>Actualizar Menú</h1>
<br>

   <div class="mb-3">
      <label for="inputEmail" class="form-label">Restaurant</label>
	  <select id="id" name="id" class="form-select">
      <option value="">Selecciona...</option>
      </select>
    </div>	

  <form id="actualizar" action="Controladores/actualizarMenu.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="inputName" class="form-label">Nombre</label>
	  <input type="hidden" class="form-control" name="idAct" id="idAct">
	  <input type="hidden" class="form-control" name="idRestaurant" id="idRestaurant">
      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del Menú">
    </div>
    <div class="mb-3">
      <label for="inputMessage" class="form-label">Menú</label>
	  <br>
      <input type="file" class="form-control-file" id="archivoMenu" name="archivoMenu" accept=".jpg, .jpeg, .png, .gif, .pdf">
    </div>
	<br>
    <button type="submit" class="btn btn-primary">Actualizar</button>
	<a href="http://localhost/CRUD/"><button type="button" class="btn btn-primary">Volver</button></a>
  </form>
</div>

  <script>
    $(document).ready(function() 
	{
	  // Load data initially
      loadData();	
      // Function to load data using AJAX
      function loadData() 
	  {
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
	  
	  $('#id').change(function() 
	  {
		var id = $('#id').val();
		if(id > 0)
		{
		// Send the input data to the PHP file using AJAX
			$.ajax({
			url: "Conexion/listaDatos.php", // The PHP file to process the data
			type: "POST",
			data: { id: id },
			success: function(response) {
				$('#idAct').val(response.id);
				$('#nombre').val(response.nombre);
				$('#idRestaurant').val(response.restaurant);
				//$('#desc').html(response.descripcion);
			},
			error: function(xhr, status, error) {
				console.error(error);
			}
			});
		}
		else
		{
			$('#idAct').val("");
			$('#nombre').val("");
			$('#idRestaurant').val("");
			$('#desc').html("");
		}
		
	});
      // Optionally, you can refresh the data every few seconds
      // setInterval(loadData, 5000); // Refresh data every 5 seconds
    });
	
	
  </script>

</body>
</html>