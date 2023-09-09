<?php
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="Librerias/js/jquery.min.js"></script>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
<h1>Nuevo Menú</h1>
<br>
  <form id="crear" action="Controladores/crearMenu.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="inputName" class="form-label">Nombre</label>
      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del Menú" required>
    </div>
    <div class="mb-3">
      <label for="Restaurant" class="form-label">Restaurant</label>
		<select required class="form-control js-example-basic-single" id="idRestaurant" name="idRestaurant" >
      </select>
    </div>
    <div class="mb-3">
      <label for="inputMessage" class="form-label">Menú (PDF o Imágen)</label>
	  <br>
      <input type="file" class="form-control-file" id="archivoMenu" name="archivoMenu" accept=".jpg, .jpeg, .png, .gif, .pdf">
    </div>
	<br>
    <button type="submit" class="btn btn-primary">Ingresar</button>
	<a href="http://localhost/CRUD/"><button type="button" class="btn btn-primary">Volver</button></a>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<script>
$(document).ready(function()
{
	llenaComboRest();
});

function llenaComboRest()
{
    $.ajax({
      dataType: "json",
      url:   'Funciones/comboRestaurant.php',
      type:  'get',
      beforeSend: function(){
        //Lo que se hace antes de enviar el formulario       
        },
      success: function(respuesta){
        //lo que se si el destino devuelve algo
       	$('#idRestaurant').html(respuesta.restaurant);
       },
      error:  function(xhr,err){ 
        alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
      }
    });
}
</script>