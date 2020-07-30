<?php
class objPaquete{
    private $Telefono;
    private $NombreDes;
    private $TelefonoDes;
    private $Fecha;
    private $IdDes;
    private $IdTipoP;

    public function __construct(){}
    public function getTelefono(){return $this->Telefono;}
    public function setTelefono($Telefono){$this->Telefono=$Telefono;}
    public function getNombreDes(){return $this->NombreDes;}
    public function setNombreDes($NombreDes){$this->NombreDes=$NombreDes;}
    public function getTelefonoDes(){return $this->TelefonoDes;}
    public function setTelefonoDes($TelefonoDes){$this->TelefonoDes=$TelefonoDes;}
    public function getFecha(){return $this->Fecha;}
    public function setFecha($Fecha){$this->Fecha=$Fecha;}
    public function getIdDes(){return $this->IdDes;}
    public function setIdDes($IdDes){$this->IdDes=$IdDes;}
    public function getIdTipoP(){return $this->IdTipoP;}
    public function setIdTipoP($IdTipoP){$this->IdTipoP=$IdTipoP;}

}
?>