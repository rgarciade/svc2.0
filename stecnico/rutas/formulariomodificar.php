<?php include("../funciones/comun.php");
      include("../funciones/funciones.php");     
       Menu("",$srva);

?>

</div>
</div>

<!--ZONA INFERIOR-->

<?php
	$cli1  = $_POST['cli'];
	$con1  = $_POST['con'];
	$tec1  = $_POST['tec'];
	$sop1  = $_POST['sop'];
	$hini1 = $_POST['hini'];
	$hfin1 = $_POST['hfin'];
	$fech1 = $_POST['fech'];
	$tex1  = $_POST['tex'];
	$pie1  = $_POST['pie'];
	$ser1  = $_POST['ser'];
  $estado = $_POST['estado'];

// array tecnico Y SOPORTE



?>


<form action="MODIFICARSERVICIO.php" method="post" class="form-group">
  <div class="row">
   
    <h2 style="text-align:center">Formulario de Servicios</h2>


  </div>

  <div class="row">
    <div class=" col-md-3">Nombre<br>
      <input  class="form-control"id="tags" name="N_CLIENTE"  class="mayusculas" value="<?PHP echo $cli1 ?>" required>
      <br>
    </div>
	<?php	//mostrar soporte 
	        mostrar_select(Reorg_arr($sop1,$arr_sop,2),"SOPORTE",3);
	?>	
    <div class=" col-md-3">Fecha <br><input  class="form-control" class="mayusculas" type="date" name="FECHA" value="<?php echo $fech1 ?>" /></div>
    <div class=" col-md-3">Contacto <br>
      <input  class="form-control"class="form-control" type="text" name="CONTACTOS" value="<?PHP echo $con1?>" class="mayusculas"/>
    </div>
  </div> 
  <div class="row">
    <div class=" col-md-3">Hora Inicio<br>
      <input  class="form-control"class="form-control" class="mayusculas" type="datetime" name="HORA_INICIO"  value="<?PHP echo $hfin1?>"/>
    </div>
    <div class=" col-md-3">Hora Fin<br>
      <input  class="form-control" class="form-control"class="mayusculas" type="datetime" name="HORA_FIN" value="<?PHP echo $hfin1>" />
    </div>
    <div class=" col-md-3">Piezas<br><input  value="<?PHP echo $pie1?>" class="form-control"class="mayusculas" type="text" name="PIEZAS"/></div>
	<?php 
	//mostrar tecnico
	    mostrar_select(Reorg_arr($tec1,$arr_Tecnicos_orig,5),"Tecnico",3);
	?>
    <div class=" col-md-12"><h4 style="text-align:center">Anotaciones</h4> <br><textarea class="form-control mayusculas" type="text" name="TEXTO"><?PHP echo $tex1?></textarea></div>
   

  </div>
    <input type="hidden" name="NUM_SERVICIO" value="<?PHP echo $ser1?>">
    
              <input class="mayusculas" type="hidden" name="estado" value="<?PHP echo $estado ?>">
    <div style="text-align:center"><br><input  class="mayusculas btn btn-primary " type="submit" value="Modificar"/></div>


  </div>
</form>
