<?php
class Puesto{
     // Atributos
     private $Id;
     private $NombrePuesto;
     private $Salario;
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
     public function setNombrePuesto($NombrePuesto){
         $this->NombrePuesto = $NombrePuesto;
    }
    public function getNombrePuesto(){
        return $this->NombrePuesto;
    }
    public function setSalario($salario){
        $this->Salario=$salario;
    }
    public function getSalario(){
        return $this->Salario;
    }
    public function setDescripcion($Descripcion){
        $this->Descripcion=$Descripcion;
    }

    public function getDescriocion(){
        return $this->Descripcion;
    }
      

}
