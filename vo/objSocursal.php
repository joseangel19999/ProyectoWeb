<?php
class objSocursal{
    private $Id;
    private $NombreS;
    private $DireccionS;
    private $TelefonoS;
    private $CorreoS;

    public function __construct(){}
    public function getId(){
        return $this->Id;
    }
    public function setId($Id){
        $this->Id=$Id;
    }
    public function getNombreS(){
        return $this->NombreS;
    }
    public function setNombreS($NombreS){
        $this->NombreS=$NombreS;
    }
    public function getDireccionS(){
        return $this->DireccionS;
    }
    public function setDireccionS($DireccionS){
        $this->DireccionS=$DireccionS;
    }
    public function getTelefonoS(){
        return $this->TelefonoS;
    }
    public function setTelefonoS($TelefonoS){
        $this->TelefonoS=$TelefonoS;
    }
    public function getCorreoS(){
        return $this->CorreoS;
    }
    public function setCorreoS($CorreoS){
        $this->CorreoS=$CorreoS;
    }
}
?>