<?php
/* hacer la conexion */
include "conexion.php";

$flujo = $_GET["flujo"];
$proceso = $_GET["proceso"];

$sql="select * from flujoproceso where flujo='$flujo' and proceso='$proceso'";
$resultado= mysqli_query($con, $sql);
$fila=mysqli_fetch_array($resultado);
if($fila["Tipo"] != "C"){
  $pantalla=$fila['Pantalla'];
  $pantalla.=".inc.php";
  $pantallalogica=$fila['Pantalla'];
  $pantallalogica.=".main.inc.php";
  $procesoanterior=$proceso;
  $proceso=$fila['ProcesoSiguiente'];
  include $pantallalogica;
}else{
  $sql1 = "select * from flujoprocesoseguimiento where flujo = '$flujo' and proceso = '$proceso' ";
  $resultado1 = mysqli_query($con, $sql1);
  $fila1 = mysqli_fetch_array($resultado1);
  $pantalla=$fila['Pantalla'];
  $pantalla.=".inc.php";
  $pantallalogica=$fila['Pantalla'];
  $pantallalogica.=".main.inc.php";
  $procesoanterior=$proceso;
  include $pantallalogica;
  $proceso=$valor;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Flujo</title>
</head>
<style>
  .signupForm1 {
    width: 100%;
    padding: 5px 0;
    background: rgba(20, 40, 40, .8);
    transition: .2s;
    h2 {
      font-weight: 300;
    }
  }
</style>
<body>
    <div class="signupSection">
      <form action="motor.php" method="GET" class="signupForm1">
        <h2>Contenido</h2>
        <input type="hidden" name="flujo" value="<?php echo $flujo;?>"/>
        <input type="hidden" name="proceso" value="<?php echo $proceso;?>"/>
        <input type="hidden" name="procesoanterior" value="<?php echo $procesoanterior;?>"/>
        <?php
          if($pantalla != ".inc.php"){
              include $pantalla;
          }else{
              header("Location: bandeja.php");
          }
        ?>
        <input type="submit" id="join-btn" name="Anterior" value="Anterior"/>
        <input type="submit" id="join-btn" name="Siguiente" value="Siguiente"/>
      </form>
    </div>
</body>
</html>
