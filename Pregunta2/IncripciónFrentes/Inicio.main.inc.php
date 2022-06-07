<?php
session_start();
$sql = "select * from frentes.candidato where idFrente = '".$_SESSION["idFrente"]."'";
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);
if($fila != null){
    $nombrecompleto = $fila["nombrecompleto"];
}else{
    $nombrecompleto = "";
}
?>