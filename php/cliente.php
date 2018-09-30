<?php 

class Cliente
{
    protected  $id;
    protected  $nombre;
    protected  $apellidos;
    protected  $dni;
    protected  $direccion;
    protected  $telefono;
    protected  $email;

    public function __construct($id,$nombre,$apellidos,$dni,$direccion,$telefono,$email) 
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->email = $email;

    }


    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

   public function getApellidos(){
        return $this->apellidos;
    }
    public function getDni(){
        return $this->dni;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function getEmail(){
        return $this->email;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
     }
    public function setApellidos($apellidos){
        $this->apellidos = $apellidos;
    }
    public function setDni($dni){
        $this->dni = $dni;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function setEmail($email){
        $this->email = $email;
    }

    public function getObject(){
        return $this->id."|".$this->nombre." ".$this->apellidos." ".$this->dni." ".$this->direccion." ".$this->telefono." ".$this->email;
    }
}
?>