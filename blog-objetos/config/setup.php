<?php 
    /* 
                    ARCHIVO DE CONFIGURACION DE LA BASE DE DATOS
        ----------------------------------------------------------------------------
         - Establece el host, usuario, contraseña y nombre de la base de datos
    */

    class setup {
        // Atributos de configuracion 
        public $db_host;
        public $db_user;
        public $db_pass;
        public $db_name;

        public function __construct($db_host, $db_user, $db_pass, $db_name)
        {
            $this->db_host = $db_host;
            $this->db_user = $db_user;
            $this->db_pass = $db_pass;
            $this->db_name = $db_name;
        }

        public function getDbHost() {
            return $this->db_host;
        }

        public function getDbUser() {
            return $this->db_user;
        }

        public function getDbPass() {
            return $this->db_pass;
        }

        public function getDbName() {
            return $this->db_name;
        }
    }