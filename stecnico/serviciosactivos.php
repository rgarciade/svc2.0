
<?php include("funciones/comun.php");
      include("funciones/funciones.php");
      Menu("servicioactivo",$srva);?>
   <!--BUCLE TABLA-->
<?PHP
						##############################
						#Efectuamos la consulta SQL####
						#############################
			$result = mysqli_query ($conexion,"SELECT * FROM servicios where Estado is not NULL order by NUM_SERVICIO DESC LIMIT 15")
			or die("Error en la consulta SQL");

						###################################
						#Mostramos los resultados obtenidos
						###################################
?>					

<?PHP				
while( $row = mysqli_fetch_array ( $result )) {

	
$row [ "NUM_SERVICIO" ];
 $a=$row [ "NUM_SERVICIO" ];

    $cli=$row [ "N_CLIENTE" ];

     $con=$row [ "CONTACTOS" ];

      $tec=$row [ "TECNICO" ];
 
      $sop=$row [ "SOPORTE" ];

      $hini=$row [ "HORA_INICIO" ];

      $hfin=$row [ "HORA_FIN" ];
 
      $fech=$row [ "FECHA" ];


      $tex=$row [ "TEXTO" ];
   $inci=$row [ "Incidencia" ];

      $pie=$row [ "PIEZAS" ];

	  $ser=$row [ "NUM_SERVICIO" ];

?>
 <!--cada tabla y formulario independiente-->
 
<div class="CSSTableGenerator" >
<table style="width: 100%" border=1 >


<tr>
  <td >N_CLIENTE</td>  
  <td >CONTACTOS</td>
  <td >TECNICO</td>  
  <td >SOPORTE</td>
  <td >HORA_INI</td>  
  
   
</tr>


<tr>
<form action="FINALIZARSERVICIO.php" method="post">



 <td><div style="text-transform: uppercase"><input id="tags"  name="N_CLIENTE" value="<?PHP echo $cli ?>" class="mayusculas" required/></div></td>
 <td><div  style="text-transform: uppercase"><input type="text" name="CONTACTOS" value="<?PHP echo $con?>" class="mayusculas"/></div></td>





<?php 
//<!--IMPUT TECNICO-->  
	mostrar_select(Reorg_arr($tec,$arr_Tecnicos_orig,5),"N_TECNICO");
//<!--select soporte--> 
 	mostrar_select(Reorg_arr($sop,$arr_sop,2),"SOPORTE");	
 ?>  
 
  <td><input type="TEXT" name="HORA_INICIO" value="<?PHP echo $hini?>"/></td>
  </tr><tr>
  <td >HORA_FIN</td>
  <td >FECHA</Td>
  <td ></td>  
  <td >PIEZAS</td>
  <td >N_SERVICIO</td>
  </tr>
  <td><input type="TEXT" name="HORA_FIN" value="<?php echo date('H:i');?>"/></td>
  <td><input type="date" name="FECHA" value="<?PHP echo $fech?>"/></td>
  <td></td>
  <td><div style="text-transform: uppercase"><input type="text" name="PIEZAS" value="<?PHP echo $pie?>" class="mayusculas"/></div></td>
  
  <td><input type="text" name="" value="<?PHP echo $ser?>"/></td>
  
  <input type="hidden" name="NUM_SERVICIO" value="<?PHP echo $ser?>">
 </tr>
  <tr>
 <td colspan="2"><h3>Incidencia</h3></td>
 <td></td>
 <td colspan="3"><h3>Texto</h3></td>
 </tr>
 <tr>
 <td colspan="2" ><div style="text-transform: uppercase"><input type="text" name="Incidencia" value="<?PHP echo $inci?>" class="mayusculas"/></div></td>
 <td></td>
 <td colspan="3"><div style="text-transform: uppercase"><input type="text" name="TEXTO" value="<?PHP echo $tex?>" class="mayusculas" required/></div> </td>
 </tr>
 <tr>
 
 <td align="center" colspan="6"> <input  type="submit" value="finalizar"/></td>
 
</form>
</tr>
</div>


</table>
 <?php 
 ##fin del wile
}

?>
</div>




</div>
<!--cerrar comun-->
<?php #Cerramos la conexión con la base de datos
mysqli_close($conexion);
?>
</body>