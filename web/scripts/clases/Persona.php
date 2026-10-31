<?php 

class Persona {

    private string $_nombre;
    private string $_fechaNacimiento;
    private string $_domicilio;
    private string $_localidad;
    private EstadoCivil $_estado;

    private function __construct() 
    {
        $this-> _nombre = "prueba";
        $this-> _fechaNacimiento = "01/01/2000";
        $this-> _domicilio = "carrera 12";
        $this-> _localidad = "antequera";
        $this-> _estado = EstadoCivil::Soltero;
    }

    public static function registrarPersona(string $nom = "prueba", string $fecha = "01/01/2000", 
                                            string $dom = "carrera 12", string $loc = "antequera",
                                            EstadoCivil $est = EstadoCivil::Soltero) : static {

        

        $obj = new static();

        $obj->setNombre($nom);
        $obj->setFechaNacimiento($fecha);
        $obj->setDomicilio($dom);
        $obj->setLocalidad($loc);
        $obj->setEstado($est);

        return $obj;
    }


    //getters y setters
    public function getNombre() : string {
        return $this->_nombre;
    }

    public function setNombre(string $nom) : void {
        $this->_nombre = $nom;
    }

    public function getFechaNacimiento() : string {
        return $this->_fechaNacimiento;
    }

    public function setFechaNacimiento(string $fecha) : void {
        $this->_fechaNacimiento = $fecha;
    }

    public function getDomicilio() : string {
        return $this->_domicilio;
    }

    public function setDomicilio(string $dom) : void {
        $this->_domicilio = $dom;
    }

    public function getLocalidad() : string {
        return $this->_localidad;
    }

    public function setLocalidad(string $loc) : void {
        $this->_localidad = $loc;
    }

    public function getEstado() : EstadoCivil {
        return $this->_estado;
    }

    public function setEstado(EstadoCivil $est) : void {
        $this->_estado = $est;
    }

    public function __toString() : string
    {
        return $this->getNombre() . " es una persona " . $this->getEstado()->descripcion() . 
                    " nacida en " . $this->getFechaNacimiento() . " y que vive en " . $this->getLocalidad();
    }

}