<?php
session_start();
$sql1 = "select * from frentes.candidato where idFrente = '".$_SESSION["idFrente"]."'";
echo $sql1;
$resultado1 = mysqli_query($con, $sql1);
$fila1 = mysqli_fetch_array($resultado1);
$_SESSION["nombrecompleto"] = $fila1["nombrecompleto"];
$_SESSION["certificadonacimiento"] = $fila1["certificadonacimiento"];
$_SESSION["ci"] = $fila1["ci"];
$_SESSION["titulo"] = $fila1["titulo"]; 
?>
