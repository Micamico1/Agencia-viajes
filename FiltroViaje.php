<?php
    class FiltroViaje {
        // Propiedades
        private $nombreHotel;
        private $ciudad;
        private $pais;
        private $fechaViaje;
        private $duracion;

        // Constructor
        public function __construct($nombreHotel = "", $ciudad = "", $pais = "", $fechaViaje = "", $duracion = 0) {
            $this->nombreHotel = $nombreHotel;
            $this->ciudad      = $ciudad;
            $this->pais        = $pais;
            $this->fechaViaje  = $fechaViaje;
            $this->duracion    = $duracion;
        }

        // Métodos Getters y Setters
        public function getNombreHotel() {
            return $this->nombreHotel;
        }
        public function setNombreHotel($nombreHotel) {
            $this->nombreHotel = $nombreHotel;
        }

        public function getCiudad() {
            return $this->ciudad;
        }
        public function setCiudad($ciudad) {
            $this->ciudad = $ciudad;
        }

        public function getPais() {
            return $this->pais;
        }
        public function setPais($pais) {
            $this->pais = $pais;
        }

        public function getFechaViaje() {
            return $this->fechaViaje;
        }
        public function setFechaViaje($fechaViaje) {
            $this->fechaViaje = $fechaViaje;
        }

        public function getDuracion() {
            return $this->duracion;
        }
        public function setDuracion($duracion) {
            $this->duracion = $duracion;
        }

        // Método para mostrar el resultado de la cotización del usuario según filtros
        public function mostrarCotizacion() {
            // Se retorna un mensaje de de la cotización del usuario para mostrar el manejo de clases.
            return "El usuario realizo una cotización a la ciudad de " . $this->ciudad . ", " . $this->pais . " para la fecha " .               $this->fechaViaje . " con una duración de " . $this->duracion . " días.";
        }
    }
?>
