<?php
    require_once __DIR__ . "/../config/conexion.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $consulta = "DELETE FROM articulos WHERE id = $id";
        $conexion->query($consulta);
    }

    header("Status: 301 Moved Permanently");        //Esto es usado para mayor eficiencia, seo etc, es decir usarlo cuando redireccionemos.
    header("Location: index.php");
    exit;

?>