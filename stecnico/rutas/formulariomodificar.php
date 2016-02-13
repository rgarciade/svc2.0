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

// array tecnico Y SOPORTE



?>


<form action="crearservicio.php" method="post" class="form-group">
  <div class="row">
   
    <h2 style="text-align:center">Formulario de Servicios</h2>


  </div>

  <div class="row">
    <div class=" col-md-3">Nombre<br>
      <input  class="form-control"id="tags" name="N_CLIENTE"  class="mayusculas" required>
      <br><?PHP echo $error;?> 
    </div>
    <div class=" col-md-3">Soporte<br>
      <select class="form-control" class="mayusculas" name="SOPORTE"pattern="|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|"required>
        <option></option>
        <option>PRESENCIAL</option>
        <option>REMOTO</optcion>
      </select>
    </div>
    <div class=" col-md-3">Fecha <br><input  class="form-control" class="mayusculas" type="date" name="FECHA" value="<?php echo date('Y-m-d'); ?>" /></div>
    <div class=" col-md-3">Contacto <br>
      <input  class="form-control"class="form-control" type="text" name="CONTACTOS"  class="mayusculas"/>
    </div>
  </div> 
  <div class="row">
    <div class=" col-md-3">Hora Inicio<br>
      <input  class="form-control"class="form-control" class="mayusculas" type="datetime" name="HORA_INICIO" value="<?php echo date('H:i'); ?>"/>
    </div>
    <div class=" col-md-3">Hora Fin<br>
      <input  class="form-control" class="form-control"class="mayusculas" type="datetime" name="HORA_FIN" value="<?php echo date('H:i'); ?>" />
    </div>
    <div class=" col-md-3">Piezas <br><input  class="form-control"class="mayusculas" type="text" name="PIEZAS"  /></div>
    <div class=" col-md-3">Anotaciones <br>
      <select class="form-control mayusculas" name="N_TECNICO" sice=""pattern="|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|"required>
        <option></option>
        <option>JORGE</option>
        <option>DAVID</option>
        <option>RAUL</option>
        <option>JOSE</option>
      </select>
    </div>  
    <div class=" col-md-12"><h4 style="text-align:center">Anotaciones</h4> <br><textarea class="form-control mayusculas" type="text" name="TEXTO"  ></textarea></div>
   

  </div>

    <div style="text-align:center"><br><input  class="mayusculas btn btn-primary " type="submit" value="insertar"/></div>

  </div>
</form>s



<div class="CSSTableGenerator" >
	<table  border=1 >
		<tr>
		  <td >N_CLIENTE</td>  
		  <td >CONTACTOS</td>
		  <td >TECNICO</td>  
		  <td >SOPORTE</td>
		  <td >HORA_INI</td>  	   
		</tr>
		<tr>
			<form action="MODIFICARSERVICIO.php" method="post">

					<td><div style="text-transform: uppercase"><input id="tags"  name="N_CLIENTE" value="<?PHP echo $cli1 ?>" class="mayusculas" required/></div></td>
					<td><div  style="text-transform: uppercase"><input type="text" name="CONTACTOS" value="<?PHP echo $con1?>" class="mayusculas"/></div></td>
				<?php 
					//mostrar tecnico
				        mostrar_select(Reorg_arr($tec1,$arr_Tecnicos_orig,5),"N_TECNICO");
					//mostrar soporte 
				        mostrar_select(Reorg_arr($sop1,$arr_sop,2),"SOPORTE");	
				 ?>  
				  <td>
				  	<input type="TEXT" name="HORA_INICIO" value="<?PHP echo $hini1?>"/>
				  </td>
			   </tr>
			   <tr>
					<td >HORA_FIN</td>
					<td >FECHA</Td>
					<td >TEXTO</td>  
					<td >PIEZAS</td>
					<td >N_SERVICIO</td>
			   </tr>
					<td>
						<input type="TEXT" name="HORA_FIN" value="<?PHP echo $hfin1?>"/>
					</td>
					<td>
						<input type="date" name="FECHA" value="<?PHP echo $fech1?>"/>
					</td>
					<td>
						<div style="text-transform: uppercase"><input type="text" name="TEXTO" value="<?PHP echo $tex1?>" class="mayusculas"/>
						</div>
					</td>
					<td>
						<div style="text-transform: uppercase"><input type="text" name="PIEZAS" value="<?PHP echo $pie1?>" class="mayusculas"/>
						</div>
					</td>

					<td>
						<input type="text" name="" value="<?PHP echo $ser1?>"/>
					</td>
		<input type="hidden" name="NUM_SERVICIO" value="<?PHP echo $ser1?>">
				</tr>
				<tr>
					<td align="center" colspan="5"> <input  type="submit" value="MODIFICAR"/>
					</td>
				 
			</form>
		</tr>
		</div>


</table>