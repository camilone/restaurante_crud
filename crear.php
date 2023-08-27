<?php
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
<h1>Nuevo Menú</h1>
<br>
  <form id="crear" action="Controladores/crearMenu.php" method="POST">
    <div class="mb-3">
      <label for="inputName" class="form-label">Nombre</label>
      <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del Menú">
    </div>
    <div class="mb-3">
      <label for="inputEmail" class="form-label">Restaurant</label>
      <select class="form-select" id="idRestaurant" name="idRestaurant">
        <option selected>Selecciona el Restaurant</option>
        <option value="Delicias">Restaurant: Delicias</option>
        <option value="Donde Miguel">Restaurant: Donde Miguel</option>
        <option value="El Encuentro">Restaurant: El Encuentro</option>
        <option value="Capriccio">Restaurant: Capriccio</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="inputMessage" class="form-label">Descripción</label>
      <textarea class="form-control" name="desc" id="desc" rows="10" placeholder="Describe tu menú"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Ingresar</button>
	<a href="http://localhost/CRUD/"><button type="button" class="btn btn-primary">Volver</button></a>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>