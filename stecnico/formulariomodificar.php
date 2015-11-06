<div name="comun">

<script language="JavaScript" src="js/jquery-1.5.1.min.js"></script>
<script language="JavaScript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
<link type="text/css" href="indexcss.css" rel="stylesheet" />
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />

<script language="javascript" src="js/jquery.js"></script>

<div name="formula predictiva">
<?php #busqueda predictiva
include("conexion.php");//se incluyen los datos para realizar la conexion a su base de datos

$con = "select cliente from clientes";//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
$query = mysqli_query ($conexion,$con);
	?>
    
    <script>
	$(function() {
		
		<?php
		
		while($row= mysql_fetch_array($query)) {//se reciben los valores y se almacenan en un arreglo
      $elementos[]= '"'.$row['cliente'].'"';
	  
}
$arreglo= implode(", ", $elementos);//junta los valores del array en una sola cadena de texto

		?>	
		var availableTags=new Array(<?php echo $arreglo; ?>);//imprime el arreglo dentro de un array de javascript
				
		$( "#tags" ).autocomplete({
			source: availableTags
		});
		
	});
	
	
	
	</script>
</div>

<?php
date_default_timezone_set("Europe/Madrid");

?>
<!--no enviar formulario con enter-->
<script language="javascript">
$(document).ready(function() {

  $('form').keypress(function(e){   
    if(e == 13){
      return false;
    }
  });

  $('input').keypress(function(e){
    if(e.which == 13){
      return false;
    }
  });

});
</script>



<div name="cabecera">
<!--PARTE SUPERIOR-->
 <script language="JavaScript">
function newPage(url){
window.open(url,"","algun parametro que desees");
}
</script>

<div id='cssmenu'>
<ul>
   <li ><a href='index.PHP'><span>STECNICO</span></a></li>
   <li ><a href='CLIENTES.PHP'><span>CLIENTE</span></a></li>
   <li class='last'><a href='BUSQUEDAS.PHP'><span>BUSQUEDAS</span></a></li>
   <li class='vol'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
   <li class='vol'><a  href='/servicios2.0'><span>MICRO-TEX</span></a></li>
</ul>
</div>

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
?>




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
				<!--IMPUT TECNICO-->  
				<?php 

					 if ($tec1 == 'JORGE') {
						echo "<td><select name='N_TECNICO' sice='' value=''pattern='|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|'required>
									<option>JORGE</option> 
									<option>DAVID</option>
									<option>RAUL</option>
									<option>JOSE</option>
																			 
									  
									
									</select>
								</td>";
					  }else{
					       
							 if ($tec1 == 'DAVID') {
								ECHO "<td><select name='N_TECNICO' sice='' value=''pattern='|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|'required>
											<option>DAVID</option>
											<option>RAUL</option>
											<option>JOSE</option>
																						 
											<option>JORGE</option>   
											
											</select>
									  </td>";
								}ELSE{
										if ($tec1 == 'RAUL') {
													ECHO "<td><select name='N_TECNICO' sice='' value=''pattern='|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|'required>
																<option>RAUL</option>
																<option>JOSE</option>
																
																<option>DAVID</option> 
																<option>JORGE</option>   
																
																</select>
														  </td>";
										}ELSE{
												if ($tec1 == 'JOSE') {
													ECHO "<td><select name='N_TECNICO' sice='' value=''pattern='|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|'required>
																<option>JOSE</option>
																<option>RAUL</option>
																<option>DAVID</option> 
																<option>JORGE</option>   
																
																</select>
														   </td>";
													}ELSE{
														
																ECHO "<td><select name='N_TECNICO' sice='' value=''pattern='|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|'required>
																		<option></option>
																		<option>JOSE</option>
																		<option>RAUL</option>
																		<option>DAVID</option> 
																		<option>JORGE</option>   
																		</select>
											     					  </td>";
														}	
											}		
									}
							}
				?>  
				<!--select soporte--> 
				<?php 

				 if ($sop1 == 'PRESENCIAL') {
						ECHO "<td><select name='SOPORTE' value='' pattern='|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|'required>
						  
						  <option>PRESENCIAL</option>
						  <option>REMOTO</optcion>
						  
						  </select>
						   </td>";
				 	}ELSE{ 
				    	if ($sop1 == 'REMOTO') {
							ECHO "<td><select name='SOPORTE' value=''pattern='|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|'required>
									<option>REMOTO</optcion>
									<option>PRESENCIAL</option>
									
									
									</select>
									</td>";
				 
								}ELSE{				
									
										ECHO "<td><select name='SOPORTE' value=''pattern='|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|'required>
											<option></option>
											<option>REMOTO</optcion>
											<option>PRESENCIAL</option>
									
											
											</select>
											</td>";
					
						}
					}	
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