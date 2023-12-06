<?php
/*
    Logica para manejar el boton de favoritos
*/


use function PHPSTORM_META\type;

// Importamos la conexion 
require_once __DIR__. "/../config/conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recoger el id del articulo
    $id = $_GET["id"];
    $cambio = "0";

    $sql = "SELECT destacado FROM articulos WHERE id = $id";
    // Preparar y ejecutar la consulta
    $consulta = $conexion->query($sql);
    $resultado = $consulta->fetch_assoc();

    if ($resultado["destacado"] == "0") {
        $cambio = "1";
    }

    $stmt = $conexion->prepare("UPDATE articulos SET destacado = ? WHERE id = $id");
    $stmt->bind_param("s", $cambio );

    // Ejecutar la consulta preparada 
    $stmt->execute();
    
    header("Location: ../views/");
}