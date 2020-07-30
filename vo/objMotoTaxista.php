<?php
class objMotoTaxista{
    private $Id;
    private $NombreT;
    private $ApellidosT;
    private $TelefonoT;
    private $LicenciaT;
    private $DireccionT;
    private $CorreoT;
    private $PasswordT;
    private $IdMotoT;
    private $SocursalT;

    public function __construct(){ }
    public function getId(){return $this->Id;}
    public function setId($Id){$this->Id=$Id;}
    public function getNombreT(){return $this->NombreT;}
    public function setNombreT($NombreT){$this->NombreT=$NombreT;}
    public function getApellidosT(){return $this->ApellidosT;}
    public function setApellidosT($ApellidosT){$this->ApellidosT=$ApellidosT;}
    public function getTelefonoT(){return $this->TelefonoT;}
    public function setTelefonoT($TelefonoT){$this->TelefonoT=$TelefonoT;}
    public function getLicenciaT(){return $this->LicenciaT;}
    public function setLicenciaT($LicenciaT){$this->LicenciaT=$LicenciaT;}
    public function getDireccionT(){return $this->DireccionT;}
    public function setDireccionT($DireccionT){$this->DireccionT=$DireccionT;}
    public function getCorreoT(){return $this->CorreoT;}
    public function setCorreoT($CorreoT){$this->CorreoT=$CorreoT;}
    public function getPasswordT(){return $this->PasswordT;}
    public function setPasswordT($PasswordT){$this->PasswordT=$PasswordT;}
    public function getIdMotoT(){return $this->IdMotoT;}
    public function setIdMotoT($IdMotoT){$this->IdMotoT=$IdMotoT;}
    public function getSocursalT(){return $this->SocursalT;}
    public function setSocursalT($SocursalT){$this->SocursalT=$SocursalT;}
}
?>