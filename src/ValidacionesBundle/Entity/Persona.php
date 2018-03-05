<?php

namespace ValidacionesBundle\Entity;

/**
 * Description of Persona
 *
 * @author emi88
 */
class Persona {

    protected $nombre;
    protected $apellido;
    protected $fechaNacimiento;

    function __construct() {
        
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

}
