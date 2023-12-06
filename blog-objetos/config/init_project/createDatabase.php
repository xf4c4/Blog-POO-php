<?php
    require_once __DIR__ . "/../config.php";

    // Creamos la conexion pero sin seleccionar base de datos porque no la tenemos todavia creada
    try {  
    // Crear la conexion
    $conexion = new mysqli($config->getDbHost(), $config->getDbUser(), $config->getDbPass());

    // Verificar la conexión
    if ($conexion->connect_error) {
        throw new Exception("Conexión fallida: " . $conexion->connect_error);
    }
    } catch (Exception $e) {
    // Manejar la excepcion
    echo "Error: " . $e->getMessage();
    }


    // Recuperamos el nombre de la base de datos que quiere el usuario
    $nameDb = $config->getDbName();

    // Creamos la base de datos con ese nombre de la base de datos del usuario
    $sql1 = "CREATE DATABASE IF NOT EXISTS $nameDb;";

    $conexion->query($sql1);

    //Seleccionamos el nombre de la base de datos que queremos
    $conexion->select_db($nameDb);

    $sql2 = "CREATE TABLE IF NOT EXISTS articulos (
                id INT PRIMARY KEY AUTO_INCREMENT,
                titulo VARCHAR(255) NOT NULL,
                contenido TEXT NOT NULL,
                imagen VARCHAR(255),
                fecha DATE NOT NULL,
                destacado BOOLEAN NOT NULL
    );";

    $sql3 = "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        email VARCHAR(255) UNIQUE,
        password VARCHAR(255)
    );";

    $conexion->query($sql3);
    $conexion->query($sql2);


    // Consultas para insertar datos 
    $sqlTest1 = "INSERT INTO articulos (titulo, contenido, imagen, fecha, destacado)
                VALUES ('Primer Artículo', 'Contenido del primer artículo.', 'default.jpg', '2023-01-01', false);";
    
    $sqlTest2 = "INSERT INTO articulos (titulo, contenido, imagen, fecha, destacado)
                VALUES ('Segundo Artículo', 'Contenido del segundo artículo.', 'default.jpg', '2023-01-01', false);";
    
    $sqlTest3 = "INSERT INTO articulos (titulo, contenido, imagen, fecha, destacado)
                VALUES ('Tercer Artículo', 'Contenido del tercer artículo.', 'default.jpg', '2023-01-01', false);";
    
    $sqlTest4 = "INSERT INTO articulos (titulo, contenido, imagen, fecha, destacado)
                VALUES ('Cuarto Artículo', 'Contenido del cuarto artículo.', 'default.jpg', '2023-01-01', false);";
    
    $sqlTest5 = "INSERT INTO articulos (titulo, contenido, imagen, fecha, destacado)
                VALUES ('Quinto Artículo', 'Contenido del quinto artículo.', 'default.jpg', '2023-01-01', false);";
    
    $sqlTest6 = "INSERT INTO articulos (titulo, contenido, imagen, fecha, destacado)
                VALUES ('Sexto Artículo', 'Contenido del sexto artículo.', 'default.jpg', '2023-01-01', false);";

    $sqlTest7 = "INSERT INTO articulos (titulo, contenido, imagen, fecha, destacado)
                VALUES ('Séptimo Artículo', 'Contenido del séptimo artículo.', 'default.jpg', '2023-01-01', false);";

    $sqlTest8 = "INSERT INTO articulos (titulo, contenido, imagen, fecha, destacado)
                VALUES ('Octavo Artículo', 'Contenido del octavo artículo.', 'default.jpg', '2023-01-01', false);";


    // Crear usuario 'root'
    $passwordHash = password_hash('root', PASSWORD_BCRYPT);
    $UserRoot = "INSERT INTO users (name, email, password)
                 VALUES ('root', 'root@root.com', '$passwordHash');";

    $conexion->query($UserRoot);

    // Ejecucionde todas las consultas de prueba para insertar datos
    $conexion->query($sqlTest1);
    $conexion->query($sqlTest2);
    $conexion->query($sqlTest3);
    $conexion->query($sqlTest4);
    $conexion->query($sqlTest5);
    $conexion->query($sqlTest6);
    $conexion->query($sqlTest7);
    $conexion->query($sqlTest8);

    // Cerramos la conexion
    $conexion->close();

?>