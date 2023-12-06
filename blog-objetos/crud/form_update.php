<?php
    require_once __DIR__ . "/../import_index/importsCommons.php";
    require_once __DIR__ . "/../views/templates/header.php";

    $id = $_GET["id"];
    $repo= new RepositorioArticulos($conexion);
    $articulo = $repo->findById($id);
?>

<div class="container">
  <h1>Formulario para modificar artículos</h1>

  <form action="update.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">    
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <div class="mb-3">
      <label for="titulo" class="form-label">Título</label>
      <input type="text" class="form-control" id="titulo" name="titulo" value='<?php echo $articulo->getTitulo();?>'  required>
    </div>

    <div class="mb-3">
      <label for="contenido" class="form-label">Contenido</label>
      <textarea class="form-control" id="contenido" name="contenido" rows="3" required><?php echo $articulo->getContenido();?></textarea>
    </div>

    <div class="mb-3">
      <label for="imagen" class="form-label">Imagen</label>
      <input type="file" class="form-control" id="imagen" name="imagen">
      <img src="../img/<?php echo $articulo->getImagen();?>" style='height: 100px' >
    </div>

    <div class="mb-3">
      <label for="fecha" class="form-label">Fecha</label>
      <input type="date" class="form-control" id="fecha" name="fecha" value='<?php echo $articulo->getFecha();?>' required>
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
  </form>

  <div class="container my-5">
    <a href="index.php" class="btn btn-primary">Volver al listado</a>
  </div>
</div>