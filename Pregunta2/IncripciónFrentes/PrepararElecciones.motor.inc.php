<?php
session_start();
/* Creando un nuevo flujo */
$sql1 = "select * from flujoprocesoseguimiento where Usuario = '".$_SESSION["sigla"]."' and proceso = 'P8'";
$resultado1 = mysqli_query($con, $sql1);
$fila1 = mysqli_fetch_array($resultado1);
if($fila1 == null){
    $sql1 = "select * from flujoprocesoseguimiento where Usuario = '".$_SESSION["sigla"]."'";
    $resultado1 = mysqli_query($con, $sql1);
    $fila1 = mysqli_fetch_array($resultado1);
    $fecha = date('Y-m-d');
    $hora = date('h:i:s');
    $sql2 = "insert into flujoprocesoseguimiento values ('F1', 'P8', '".$fila1["NumeroTramite"]."', '".$_SESSION["sigla"]."', '$fecha', '$hora', '$fecha', '$hora')";
    $resultado1 = mysqli_query($con, $sql2);
}
?>