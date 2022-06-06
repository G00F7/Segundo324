<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="signupSection">
        <form action="validFrente.php" method="GET"class="signupForm">
            <h2>Flujo de Frentes</h2>
            <h2>Inicio de Sesion</h2>
            <ul class="noBullet">
                <li>
                    <label for="sigla del frente"></label>
                    <input type="text" class="inputFields" name="sigla" placeholder="Sigla Del Frente" value="" required/>
                </li>
                <li>
                    <label for="codigo"></label>
                    <input type="password" class="inputFields" name="codigo" placeholder="Codigo" value="" required/>
                </li>
                <li>
                    <input type="submit" id="join-btn" name="enviar" value="Ingresar">
                </li>
            </ul>
        </form>
        <div class="info">
            <h2>Frentes Inscritos</h2>
            <?php
            /* connexion */
            include "conexion.php";
            $sql = "select * from frentes.frente ";
            $resultado = mysqli_query($con, $sql);
            ?>
            <table>
                <tr>
                <td>Nombre</td>
                <td>Sigla</td>
                </tr>
                <?php
                while($fila = mysqli_fetch_array($resultado)){
                    echo "<tr>";
                    echo "<td>".$fila["nombre"]."</td>";
                    echo "<td>".$fila["sigla"]."</td>";
                    echo "</tr>";
                }
                ?>    
            </table>
            <a href="agregar.php" style="color:#FFFFFF">Agregar Frente</a>
        </div>
    </div>
    
</body>
</html>

<br><br>

