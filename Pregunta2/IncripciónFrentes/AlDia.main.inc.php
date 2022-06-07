<?php
session_start();

$fujo = $_GET["flujo"];
$proceso = $_GET["proceso"];
$sql = "select * from flujoprocesocondicionante where Flujo = '$flujo' and Proceso = '$proceso'";
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);

if($_SESSION["certificadonacimiento"] != "no" and $_SESSION["ci"] != "no" and $_SESSION["titulo"] != "no"){
    $valor = $fila['ProcesoSI'];
}else{
    $valor = $fila['ProcesoNO'];
}
?>