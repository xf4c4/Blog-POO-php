<?php
    class Articulo{
        private $id;
        private $titulo;
        private $contenido;
        private $imagen;
        private $fecha;
        private $destacado;

        public function __construct()
        {
            $this->fecha = date('Y-m-d');
        }

        // Funcion para establecer para establecer todos los valores con un solo metodo
        public function setPropiedades($tit, $cont, $img, $destacado){
            $this->titulo=$tit;
            $this->contenido = $cont;
            $this->imagen = $img;
            $this->destacado = $destacado;
        }

        // Metodo para mostrar los atributos en los detalles de cada blog
        public function mostrar(){
            return (
               "<br>
                <h1 class='text-center'>$this->titulo</h1>
                <h6 class='text-center'>Fecha del artículo: $this->fecha</h6>
                <img class='mx-auto d-block' src='../img/$this->imagen' alt='foto del articulo' style='height:200px;'>
                <p class='text-center'>$this->contenido</p>
                <br>"
            );
        }

        /*
            Metodo para mostrar la tarjeta con el articulo
            Hecho con los estilos predefinidos de Bootstrap
        */
        public function mostrarCard(){
           $txtHtml  = "<div class='card' style='width: 18rem; padding:10px;'>";
           $txtHtml .= "<img class='card-img-top' src='../img/$this->imagen' alt='foto del articulo' style='width: 268px; height: 268px;'>";
           $txtHtml .= "<div class='card-body'>";
           $txtHtml .= "<h5 class='card-title'>$this->titulo</h5>";
           $aux = strlen($this->contenido)>15 ? substr($this->contenido,0,15) . "..." : $this->contenido;
           $txtHtml .= "<p class='card-text'>$aux</p>";
           $txtHtml .= "<a href='./details.php?id=$this->id' class='btn btn-primary'>Ver la noticia.</a>";
           $txtHtml .= "<form action='../logic/handleOutStanding.php?id=$this->id' method='post'>";
           $star = $this->destacado == 0 ? "bi bi-star" : "bi bi-star-fill";
           $txtHtml .= "<button class='btn btn-warning rounded-pill px-3 py-2 position-absolute bottom-0 end-0' type='submit'><i class='$star'></i></button>";
           $txtHtml .= "</form>";
           $txtHtml .= '</div> </div>';
           return $txtHtml;
        }

        // Todos los Getters y Setters de las propiedades
        public function getId() {
            return $this->id;
        }

        public function setId($id){
            $this->id=$id;
        }

        public function setFecha($fecha){
            $this->fecha=$fecha;            
        }

        public function getFecha(){
            return $this->fecha;
        }

        public function setTitulo($titulo){
            $this->titulo=$titulo;
        }

        public function getTitulo(){
            return $this->titulo;
        }

        public function setContenido($contenido){
            $this->contenido=$contenido;
        }

        public function getContenido(){
            return $this->contenido;
        }

        public function setImagen($Imagen){
            $this->imagen=$Imagen;
        }

        public function getImagen(){
            return $this->imagen;
        }

        public function setDestacado($destacado){
            $this->destacado=$destacado;
        }

        public function getDestacado(){
            return $this->destacado;
        }
    }