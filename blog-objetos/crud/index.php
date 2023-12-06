<?php
    require_once __DIR__ . "/../import_index/importsCommons.php";
    require_once __DIR__ .  "/../views/templates/header.php";
    require_once __DIR__ .  "/../views/templates/navbar.php";

    //Si no está establecido el usuario me redireccion al login 
    if (!isset($_SESSION["user"])) header("Location: ../");
    
    $repo=new RepositorioArticulos($conexion);

    $lista = $repo->findAll();

    echo "<div class='container'>";

    echo "<a class='btn btn-primary' href='form_add.php'>Añadir artículo</a>";

    echo "<table class='table'>";
    echo "<tr><th>Id</th><th>Título</th><th>Acciones</th></tr>";
    
    foreach($lista as $articulo){
        echo "<tr><td>" . $articulo->getId() . "</td>";
        echo "<td>" . $articulo->getTitulo() . "</td>";
        echo "<td><a class='btn btn-warning rounded-pill' href='form_update.php?id=" . $articulo->getId() . "'> Modificar </a>"; 
        echo "<a class='btn btn-danger rounded-pill' href='borrar.php?id=" . $articulo->getId() . "'>Borrar</td></tr>";
    }
    
    echo "</table></div>";

    require_once "../views/templates/footer.php";

