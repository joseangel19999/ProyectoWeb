<?php

class AreaTrabajo{
     // Atributos
     private $Id;
     private $NombreArea;
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
     public function setNombreArea($NombreArea){
         $this->NombreArea = $NombreArea;
    }
    public function getNombreArea(){
        return $this->NombreArea;
    }

    public function setDescripcion($Descripcion){
        $this->Descripcion=$Descripcion;
    }

    public function getDescriocion(){
        return $this->Descripcion;
    }
      

}
