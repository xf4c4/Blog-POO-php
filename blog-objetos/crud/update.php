<?php
    require_once __DIR__ . "/../import_index/importsCommons.php";

    if (isset($_POST['submit'])) {
        if(isset($_FILES['imagen']) && $_FILES['imagen']['tmp_name']!=""){
          $nombreFichero = date("Y-m-d - H-i-s")."-".$_FILES['imagen']['name'];
          //Leo la ubicación temporal del archivo para después dejarlo en la carpeta deseada
          $file_loc = $_FILES['imagen']['tmp_name'];        
          //movemos el archivo a la carpeta deseada
          move_uploaded_file($file_loc, "../img/".$nombreFichero); 
        }else{
          $nombreFichero="default.jpg";
        }

        $articulo=new Articulo();
        $articulo->setPropiedades($_POST["titulo"], $_POST["contenido"], $nombreFichero, 0);
        $articulo->setFecha($_POST["fecha"]);
        $articulo->setId($_POST["id"]);
        $repo=new RepositorioArticulos($conexion);
        $repo->update($articulo);

        header("location: index.php");
    }