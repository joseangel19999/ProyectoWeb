<?php
class objCliente{
    private $Id;
    private $NombreC;
    private $ApellidosC;
    private $TelefonoC;
    private $DireccionC;
    private $CorreoC;
    private $PasswordC;
    private $SocursalC;

    public function __construct(){ }
    public function getId(){return $this->Id;}
    public function setId($Id){$this->Id=$Id;}
    public function getNombreC(){return $this->NombreC;}
    public function setNombreC($NombreC){$this->NombreC=$NombreC;}
    public function getApellidosC(){return $this->ApellidosC;}
    public function setApellidosC($ApellidosC){$this->ApellidosC=$ApellidosC;}
    public function getTelefonoC(){return $this->TelefonoC;}
    public function setTelefonoC($TelefonoC){$this->TelefonoC=$TelefonoC;}
    public function getDireccionC(){return $this->DireccionC;}
    public function setDireccionC($DireccionC){$this->DireccionC=$DireccionC;}
    public function getCorreoC(){return $this->CorreoC;}
    public function setCorreoC($CorreoC){$this->CorreoC=$CorreoC;}
    public function getPasswordC(){return $this->PasswordC;}
    public function setPasswordC($PasswordC){$this->PasswordC=$PasswordC;}
    public function getSocursalC(){return $this->SocursalC;}
    public function setSocursalC($SocursalC){$this->SocursalC=$SocursalC;}
}
?>