<?php
$valorId=$_POST['ID'];
echo $valorId;
class Objeto{
    function __construct(){
       
        echo "<p> nuevo main </p>";
    }
    public $var=2;
    public function saludo($valor){
        echo 'valor '.$valor;
        $var=$valor;
    }

    public function Id(){
      //echo $valorId;
    }
}
?>