<p>Causa de Negativa</p>
<table style="margin: 0 auto;">
    <tr>
        <td>Documentos No Entregados</td>
    </tr>
<?php
if($_SESSION["certificadonacimiento"]== "no"){
    echo "<tr>";
    echo "<td>Certifica Nacimiento</td>";
    echo "</tr>";
}
if($_SESSION["ci"]== "no"){
    echo "<tr>";
    echo "<td>Cedula de Identidad</td>";
    echo "</tr>";
}
if($_SESSION["titulo"] == "no"){
    echo "<tr>";
    echo "<td>Titulo</td>";
    echo "</tr>";
}
?>
</table>