<?php

  require_once __DIR__ . "./config.php";

  try {  
    // Crear la conexion
    $conexion=new mysqli($config->getDbHost(), $config->getDbUser(), $config->getDbPass(), $config->getDbName());

    // Verificar la conexión
    if ($conexion->connect_error) {
      throw new Exception("Conexión fallida: " . $conexion->connect_error);
    }
  } catch (Exception $e) {
    // Manejar la excepcion
    echo "Error: " . $e->getMessage();
  }
    