<p>Recepcion de Documentos </p>
<table style="margin: 0 auto;">
    <tr>
        <td>Documentos</td>
        <td>Entregados</td>
    </tr>
<?php
echo "<tr>";
echo "<td>Certificado Nacimiento</td>";

if($_SESSION["certificadonacimiento"] != "no"){
    echo "<td>Si</td>";
}else{
    echo "<td>No</td>";
}
echo "</tr>";
echo "<tr>";
echo "<td>Cedula de Identidad</td>";
if($_SESSION["ci"] != "no"){
    echo "<td>Si</td>";
}else{
    echo "<td>No</td>";
}
echo "</tr>";
echo "<tr>";
echo "<td>Titulo</td>";
if($_SESSION["titulo"] != "no"){
    echo "<td>Si</td>";
}else{
    echo "<td>No</td>";
}
echo "</tr>";
?>
</table>