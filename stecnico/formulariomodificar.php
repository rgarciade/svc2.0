<?php include("funciones/comun.php");
      include("funciones/funciones.php");?>
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

// array tecnico Y SOPORTE
$Tecnicos_orig = array("RAUL", "JORGE", "DAVID", "JOSE","");
$sop = array("PRESENCIAL","REMOTO");


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
				<?php 
					//mostrar tecnico				
				$Tecnicos_fin = Reorg_arr($tec1,$Tecnicos_orig,5);
				        mostrar_select($Tecnicos_fin,"N_TECNICO");
					//mostrar soporte 
				$Soporte_fin = Reorg_arr($sop1,$sop,2);
				        mostrar_select($Soporte_fin,"SOPORTE");	
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