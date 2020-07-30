<?php
class objEmpleado{
    private $Id;
    private $NombreE;
    private $ApellidosE;
    private $TelefonoE;
    private $DireccionE;
    private $CorreoE;
    private $PasswordE;
    private $PuestoTrabajoE;
    private $AreaTrabajoE;
    private $SocursalE;

    public function __construct(){ }
    public function getId(){return $this->Id;}
    public function setId($Id){$this->Id=$Id;}
    public function getNombreE(){return $this->NombreE;}
    public function setNombreE($NombreE){$this->NombreE=$NombreE;}
    public function getApellidosE(){return $this->ApellidosE;}
    public function setApellidosE($ApellidosE){$this->ApellidosE=$ApellidosE;}
    public function getTelefonoE(){return $this->TelefonoE;}
    public function setTelefonoE($TelefonoE){$this->TelefonoE=$TelefonoE;}
    public function getDireccionE(){return $this->DireccionE;}
    public function setDireccionE($DireccionE){$this->DireccionE=$DireccionE;}
    public function getCorreoE(){return $this->CorreoE;}
    public function setCorreoE($CorreoE){$this->CorreoE=$CorreoE;}
    public function getPasswordE(){return $this->PasswordE;}
    public function setPasswordE($PasswordE){$this->PasswordE=$PasswordE;}
    public function getPuestoTrabajoE(){return $this->PuestoTrabajoE;}
    public function setPuestoTrabajoE($PuestoTrabajoE){$this->PuestoTrabajoE=$PuestoTrabajoE;}
    public function getAreaTrabajoE(){return $this->AreaTrabajoE;}
    public function setAreaTrabajoE($AreaTrabajoE){$this->AreaTrabajoE=$AreaTrabajoE;}
    public function getSocursalE(){return $this->SocursalE;}
    public function setSocursalE($SocursalE){$this->SocursalE=$SocursalE;}
}
?>