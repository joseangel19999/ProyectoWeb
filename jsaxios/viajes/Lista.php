<?php
  $conexion = new mysqli("localhost", "root", "", "bdmototaxi");
  $query2 = "call SpSelectViajes();";
  $stmt = $conexion->prepare($query2);
  $stmt->execute();
  $res = $stmt->get_result();
  $i=0;
  while ($fila = mysqli_fetch_assoc($res)) {
    $rowdata[$i] = $fila;
    $i++;
  }
  echo json_encode($rowdata);
?>