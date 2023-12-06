<!-- Importamos archivos comunes -->
<?php require_once __DIR__ .  "/../import_index/importsCommons.php"; ?>

<!-- Importamos el header -->
<?php require_once __DIR__ . "./templates/header.php"; ?>

<!-- Importamos la navbar -->
<?php require_once __DIR__ . "./templates/navbar.php"; ?> 

<!-- Si no está establecido el usuario me redireccion al login -->
<?php if (!isset($_SESSION["user"])) header("Location: ../")?>

<!-- Codigo principal -->
<?php
    // Retornamos un objeto con los datos del id que recuperamos por metodo 'get'
    $articulo = $rep->findById($_GET["id"]);

    try {
        
        // Si el articulo es null me redirecciona al index
        if($articulo == null) header("Location: ./index.php");

    } catch (Exception $e) {
        // Si hubiera otro error me redirecciona al index
        header("Location: ./index.php");
    }
    
    echo $articulo->mostrar();
?>

<!-- Importamos el footer -->
<?php require_once __DIR__ . "./templates/footer.php"; ?>