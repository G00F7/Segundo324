<?php
/* hacer la conexion */
include "conexion.php";

session_start();

$sigla = $_GET["sigla"];
$idFrente = $_GET["codigo"];

/* Validar si el frente se encuentra en la base de datos */
$sql = "select * from frentes.frente where sigla = '$sigla'";
$sql .= " and idFrente = '$idFrente'";
$resultado = mysqli_query($con, $sql);
$fila = mysqli_fetch_array($resultado);

if(isset($fila["idFrente"])){
    print_r ($fila);
    $_SESSION["idFrente"] = $fila["idFrente"];
    $_SESSION["nombre"] = $fila["nombre"];
    $_SESSION["sigla"] = $fila["sigla"];
    header("Location: bandeja.php");
}else{
    header ("Location: index.php");
}
?>

