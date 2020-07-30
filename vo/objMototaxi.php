<?php

class Mototaxi{
     // Atributos
     private $Id;
     private $Marca;
     private $Nombre;
     private $Placa;

     //Contructor vacio
     function __construct() {
        
    }
      
     //Métodos
     public function getId(){
         return $this->Id;
     }
      
     public function setId($Id){
        // Con el operador $this le decimos que busque el atributo Id
      return $this->Id=$Id;
    }
     public function setMarca($Marca){
         $this->Marca = $Marca;
    }
    public function getMarca(){
        return $this->Marca;
    }
    public function setNombre($nombre){
        $this->Nombre=$nombre;
    }

    public function getNombre(){
        return $this->Nombre;
    }

    public function setPlaca($Placa){
        $this->Placa=$Placa;
    }

    public function getPlaca(){
        return $this->Placa;
    }
      

}
