<?php
    require_once __DIR__ . "./Articulo.php";

    class RepositorioArticulos{
        private $conexion;

        public function __construct($con)
        {            
            $this->conexion = $con;
        }

        public function findAll() {
            //Escribo el texto de la consulta para recuperar todos los artículos de la BBDD
            $textoSQL = "SELECT * FROM articulos";
            //Realizo la consulta aprovechando la conexión que me han pasado en el constructor
            $resultado = $this->conexion->query($textoSQL);
            //Array de artículos que vamos a devolver
            $arts=[];
            $cont=0;
            //Mientras haya filas en la consulta, las convierto en artículos del array
            while($fila = $resultado->fetch_object()){
                $arts[]=new Articulo();
                $arts[$cont]->setPropiedades($fila->titulo, $fila->contenido, $fila->imagen, $fila->destacado);
                $arts[$cont]->setId($fila->id);
                $cont++;
            }

            return $arts;
        }

        public function findById($idABuscar) {
            // Utilizar parámetros preparados para evitar SQL injection
            $textoSQL = "SELECT * FROM articulos WHERE id = ?";
            
            try {
                // Preparar la consulta
                $stmt = $this->conexion->prepare($textoSQL);
                $stmt->bind_param("i", $idABuscar);
                $stmt->execute();
                $resultado = $stmt->get_result();
                
                // Si obtiene 0 registros me devuelve null
                if ($resultado->num_rows === 0) {
                    return null;
                }

                $fila = $resultado->fetch_object();
        
                // Crear un objeto Articulo
                $articulo = new Articulo();
                $articulo->setPropiedades($fila->titulo, $fila->contenido, $fila->imagen, $fila->destacado);
                $articulo->setId($fila->id);
        
                // Cerrar la declaración y liberar recursos
                $stmt->close();
        
                return $articulo;

            } catch (Exception $e) {
                // Manejar la excepción de manera adecuada
                echo "Error: " . $e->getMessage();
                return null;
            }
        }
        

        public function save($articulo){
            $textoSQL = "INSERT INTO articulos (titulo, contenido, imagen, fecha, destacado) VALUES";
            $textoSQL .= "('" . 
                        $articulo->getTitulo() ."', '" . $articulo->getContenido() . "', '" . $articulo->getImagen() . "', '" . $articulo->getFecha() . "', '" . $articulo->getDestacado() . "');";
            $this->conexion->query($textoSQL);
        }

        public function update($articulo){
            $textoSQL  = "UPDATE articulos SET titulo='" . $articulo->getTitulo() . "', ";
            $textoSQL .= " contenido='" . $articulo->getContenido() . "', ";
            $textoSQL .= " imagen='" . $articulo->getImagen() . "', ";
            $textoSQL .= " fecha='" . $articulo->getFecha() . "' ";
            $textoSQL .= "WHERE id=" . $articulo->getId();

            $this->conexion->query($textoSQL);
        }

        public function findAllDestacados () {
            $sql = "SELECT id FROM articulos WHERE destacado = 1";
            $consulta = $this->conexion->query($sql);
            $resultado = array();
            while ($fila = $consulta->fetch_assoc()) {
                $resultado[] = $fila["id"];
            }
            return $resultado;
        }
    }

    