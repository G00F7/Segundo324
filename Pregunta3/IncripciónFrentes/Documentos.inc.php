<p>Preparacion de Documentos </p>
<?php
/* echo "<p>Frente : ".$_SESSION["nombre"]."</p>";
echo "<p>Sigla : ".$_SESSION["sigla"]."</p>"; */
echo "<p>El candidato : ".$_SESSION["nombrecompleto"]."</p>";
?>
<ul class="noBullet">
    <li>
Certificado Nacimiento: <input type="text" class="inputFields" name="certificadonacimiento" value="<?php echo $certificadonacimiento;?>">
    </li>
    <li>
CI: <input type="text" class="inputFields" name="ci" value="<?php echo $ci;?>">
    </li>
    <li>
Titulo: <input type="text" class="inputFields" name="titulo" value="<?php echo $titulo;?>">
    </li>
</ul>


