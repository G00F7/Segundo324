<?php
session_start();
$sql = "select * from frentes.candidato where idFrente = '".$_SESSION["idFrente"]."'";
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);
if($fila != null){
    $certificadonacimiento = $_GET["certificadonacimiento"];
    $ci = $_GET["ci"];
    $titulo = $_GET["titulo"];
    $sql = "update frentes.candidato set certificadonacimiento = '$certificadonacimiento', ci ='$ci', titulo ='$titulo' where idFrente = '".$_SESSION["idFrente"]."' and nombrecompleto = '".$_SESSION["nombrecompleto"]."'";
    $resultado = mysqli_query($con, $sql);
    $_SESSION["certificadonacimiento"] = $_GET["certificadonacimiento"];
    $_SESSION["ci"] = $_GET["ci"];
    $_SESSION["titulo"] = $_GET["titulo"];
}
/* Creando un nuevo flujo */
$sql1 = "select * from flujoprocesoseguimiento where Usuario = '".$_SESSION["sigla"]."' and proceso = 'P2'";
$resultado1 = mysqli_query($con, $sql1);
$fila1 = mysqli_fetch_array($resultado1);
if($fila1 == null){
    $sql1 = "select * from flujoprocesoseguimiento where Usuario = '".$_SESSION["sigla"]."'";
    $resultado1 = mysqli_query($con, $sql1);
    $fila1 = mysqli_fetch_array($resultado1);
    $fecha = date('Y-m-d');
    $hora = date('h:i:s');
    $sql2 = "insert into flujoprocesoseguimiento values ('F1', 'P2', '".$fila1["NumeroTramite"]."', '".$_SESSION["sigla"]."', '$fecha', '$hora', '$fecha', '$hora')";
    $resultado1 = mysqli_query($con, $sql2);
}
?>

