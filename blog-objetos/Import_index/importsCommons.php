<?php
    // Importaciones comunes en muchos archivos
    require_once __DIR__ . "/../model/Articulo.php";
    require_once __DIR__ . "/../model/RepositorioArticulos.php";
    require_once __DIR__ . "/../config/conexion.php"; 

    // Objeto para poder usar los metodos de la clase RepositorioArticulos
    $rep = new RepositorioArticulos($conexion);
?>