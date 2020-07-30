<?php
class TipPaquete
{
    private $Id;
    private $TipoP;
    private $Precio;
    private $Desc;

    function __construct()
    {
    }
    public function getId()
    {
        return $this->Id;
    }
    public function setId($Id)
    {
        $this->Id = $Id;
    }
    public function getTipoP()
    {
        return $this->TipoP;
    }
    public function setTipoP($TipoP)
    {
        $this->TipoP = $TipoP;
    }
    public function getPrecio()
    {
        return $this->Precio;
    }
    public function setPrecio($Precio)
    {
        $this->Precio = $Precio;
    }
    public function getDesc()
    {
        return $this->Desc;
    }
    public function setDesc($Desc)
    {
        $this->Desc = $Desc;
    }
}
