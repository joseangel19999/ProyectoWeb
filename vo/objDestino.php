<?php

class Destino{
     // Atributos
     private $Id;
     private $NomDestino;
     private $Precio;
     private $Descripcion;

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
     public function setNomDestino($NomDestino){
         $this->NomDestino = $NomDestino;
    }
    public function getNomDestino(){
        return $this->NomDestino;
    }

    public function setPrecio($Precio){
        $this->Precio=$Precio;
    }

    public function getPrecio(){
        return $this->Precio;
    }

    public function setDescripcion($Descripcion){
        $this->Descripcion=$Descripcion;
    }

    public function getDescriocion(){
        return $this->Descripcion;
    }
      

}
