<?php

/*
    ****@author Rafa 

    ARRAY ASOCIATIVO CON LOS VALORES DE TU CONEXION A LA BASE DE DATOS
    **
      Modificar el valor de cada clave del array asociativo segun tus valores de conexion
    **
      El nombre que establezcas para la base de datos será el mismo nombre que te creará el archivo 'createDatabase.php'
*/


//------------------------------//
    $setup = [

        // Ip host de tu usuario
        "host" => "127.0.0.1",

        // Nombre de usuario en la base de datos
        "user" => "root",

        // Contraseña de tu usuario de base de datos
        "pass" => "",

        // Nombre que quieres que tenga la base de datos
        "dbname" => "blog",

    ];
//------------------------------//

  
/*
    ARCHIVOS DE CONFIGURACION DE BASE DE DATOS
    NO TOCAR
*/
    require_once __DIR__ . "./setup.php";

    // Objeto con los valores de la conexion
    $config = new setup($setup["host"],$setup["user"],$setup["pass"],$setup["dbname"]);