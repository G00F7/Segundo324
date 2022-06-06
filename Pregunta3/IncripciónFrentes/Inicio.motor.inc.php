<?php
session_start();
$_SESSION["nombrecompleto"] = $_GET["nombrecompleto"]; 
$sql = "select * from frentes.candidato where idFrente = '".$_SESSION["idFrente"]."'";
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);
if($fila == null){
    $nombrecompleto = $_GET["nombrecompleto"];
    $sql = "insert into frentes.candidato values ('$nombrecompleto', null, null, null, '".$_SESSION["idFrente"]."')";
    $resultado = mysqli_query($con, $sql);   
}
/* Creando un nuevo flujo */
$sql1 = "select * from flujoprocesoseguimiento where Usuario = '".$_SESSION["sigla"]."' and proceso = 'P1'";
$resultado1 = mysqli_query($con, $sql1);
$fila1 = mysqli_fetch_array($resultado1);
if($fila1 == null){
    $ale = rand(999, 5000);
    $fecha = date('Y-m-d');
    $hora = date('h:i:s');
    $sql1 = "insert into flujoprocesoseguimiento values ('F1', 'P1', '$ale', '".$_SESSION["sigla"]."', '$fecha', '$hora', '$fecha', '$hora')";
    $resultado1 = mysqli_query($con, $sql1);
}
?>