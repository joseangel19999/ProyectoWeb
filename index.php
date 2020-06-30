<?php 
  require_once "./core/confiGeneral.php";
  //modelos
 
  //controladores
  require_once "./controlador/controladorPuesto/CtrPuestos.php";
  require_once "./controlador/vistasControlador.php";
  //require_once "./controlador/controladorPuesto/CtrPuestos.php";

$plantilla= new vistasControlador();
$plantilla->obtener_plantilla_controlador();

