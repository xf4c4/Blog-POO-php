<?php
  require_once __DIR__ . "/../views/templates/header.php";
?>
<div class="container">
  <h1>Formulario para añadir artículos</h1>

  <form action="add.php" method="post" enctype="multipart/form-data">    

    <div class="mb-3">
      <label for="titulo" class="form-label">Título</label>
      <input type="text" class="form-control" id="titulo" name="titulo" required>
    </div>

    <div class="mb-3">
      <label for="contenido" class="form-label">Contenido</label>
      <textarea class="form-control" id="contenido" name="contenido" rows="3" required></textarea>
    </div>

    <div class="mb-3">
      <label for="imagen" class="form-label">Imagen</label>
      <input type="file" class="form-control" id="imagen" name="imagen">
    </div>

    <div class="mb-3">
      <label for="fecha" class="form-label">Fecha</label>
      <input type="date" class="form-control" id="fecha" name="fecha" required>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
  </form>

  <div class="container my-5">
    <a href="index.php" class="btn btn-primary">Volver al listado</a>
  </div>
</div>