<?php
#######rewsultados
while( $row = mysqli_fetch_array ( $consulta1 )) {
$row [ "NUM_SERVICIO" ];
 $a=$row [ "NUM_SERVICIO" ];
echo "<tr>";
             $cli  = Element_tabla($row,"N_CLIENTE");

              $con  = Element_tabla($row,"CONTACTOS");

              $tec  = Element_tabla($row,"TECNICO");

              $sop  = Element_tabla($row,"SOPORTE");

              $hini = Element_tabla($row,"HORA_INICIO");

              $hfin = Element_tabla($row,"HORA_FIN");

              $fech = Element_tabla($row,"FECHA");

              $tex  = Element_tabla($row,"TEXTO");

              $pie  = Element_tabla($row,"PIEZAS");

              $ser  = Element_tabla($row,"NUM_SERVICIO");

              $estado  = Element_tabla($row,"Estado");
echo "<td>";
?>


<form action="../rutas/formulariomodificar.php" method="POST">
<input type="hidden" name="cli" value="<?PHP echo $cli ?>">
<input type="hidden" name="con" value="<?PHP echo $con ?>">
<input type="hidden" name="tec" value="<?PHP echo $tec ?>">
<input type="hidden" name="sop" value="<?PHP echo $sop ?>">
<input type="hidden" name="hini" value="<?PHP echo $hini ?>">
<input type="hidden" name="hfin" value="<?PHP echo $hfin ?>">
<input type="hidden" name="fech" value="<?PHP echo $fech ?>">
<input type="hidden" name="tex" value="<?PHP echo $tex ?>">
<input type="hidden" name="pie" value="<?PHP echo $pie ?>">
<input type="hidden" name="ser" value="<?PHP echo $ser ?>">
<input class="mayusculas" type="hidden" name="estado" value="<?PHP echo $estado ?>">
<input type="submit" value=""/>
 <!--<input type="button" value="" onClick="window.location.href='formulariomodificar.html'">-->
</form>
 <?php 

echo "</td>";

}