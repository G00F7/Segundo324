<?php
/* conexion */
include "conexion.php";
session_start();
$nombre = $_GET["nombre"];
$sigla = $_GET["sigla"];
$idFrente = $_GET["codigo"];
$sql = "insert into frentes.frente values ('$idFrente', '$nombre', '$sigla')";
$resultado = mysqli_query($con, $sql);
$_SESSION["idFrente"] = $idFrente;
$_SESSION["nombre"] = $nombre;
$_SESSION["sigla"] = $sigla;
header("Location: bandeja.php");
?>
