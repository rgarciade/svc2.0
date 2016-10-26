
<?php

	include("comun.php");     
     // Menu("clientes",$srva);
?>
<script>
//definir variable vision
	var countvisib = 0;

		function cambiar(){

 		
 		if (countvisib == 0 ) {
 			document.getElementById("superior").classList.remove('show');
 			document.getElementById("zona_inferior").classList.remove('hide');
 			
 			countvisib =1;
 		}else{
 			document.getElementById("zona_inferior").classList.add('hide');
 			document.getElementById("superior").classList.add('show');
 			
 			
 			countvisib =0;
 		}
		
		
	}
</script>


	<?php #variables en blanco
	$con="";
	$nom="";
	$tel="";
	$cal="";
	$mai="";
	$mostrar_infe = false;
	?>

	<?php #CONEXION Y CONDICIONES

	if( isset($_GET['as']))
	{

	$as1=$_GET['as'];
		if($as1 === "activ"){$mostrar_infe = true;}
	}else{
	$as1="1";}

	if( isset($_GET['as2']))
	{
	$as2=$_GET['as2'];

	}else{
	$as2="2";}

	if( isset($_GET['cr']))
	{
	$cr1=$_GET['cr'];


	}else{
	$cr1="2";}

	if( isset($_POST['N_CLIENTE'])){
			
			$nom=$_POST['N_CLIENTE'];
					# ################################### #
									##############################
									#Efectuamos la consulta SQL####
									#############################
			
										
			$result = mysqli_query ($conexion,"select * from clientes where cliente='$nom'" )
				or die("Error en la consulta SQL");


			#Mostramos los resultados obtenidos
			while( $row = mysqli_fetch_array ( $result )) {
				$nom=$row [ "cliente" ];
				$con=$row [ "contacto" ];
				$tel=$row [ "telefono" ];
				$cal=$row [ "calle" ];
				$mai=$row [ "correo" ];
			}

			$numero_filas = mysqli_num_rows($result);
			 if ($numero_filas == 0 ) {
				 $nom="";
				#Cerramos la conexión con la base de datos


				$as2 = "ERROR2";
			}else{
				$as2 ="";
				$mostrar_infe = true;

			}

			#Cerramos la conexión con la base de datos
			mysqli_close($conexion);
	}
?>
<div name="superior" id="superior" class="show hide">
		<div class="row">
			<div class=" col-md-4"></div>
				<div class=" col-md-3">
					<h2 style="text-align:center">BUSCAR CLIENTE</h2>
				</div>
 			<div class=" col-md-5"></div>
 		</div>

		<br><br>
	<form action="CLIENTES.php" method="post" name="formulario1">
		<div class="estadosClientes">





		<?PHP  


		if ($cr1=="b"){echo "
			<div class='row' >
				<div class= col-md-5></div>
					<div class= col-md-3>
								
									<img src='../images/tic.jpg' width='5%' height='15%'>
									<div style='color:#00FF00;'>
										<P> cliente CREADO </P>
										</div>
			 		</div>
				<div class= col-md-4></div>
			</div>";

	 				}
		if ($as1=="error1"){
			echo "
			<div class='row'>
				<div class= col-md-5></div>
					<div class= col-md-3>
							<img src='../images/ERRORES/error1.gif' width='15%' height='25%'> 
							<div style='color:#00FF00;'>
								<P>EL cliente YA EXISTE</P>
							</div>
			 		</div>
				<div class= col-md-4></div>
			</div>";
			 						}elseif ($as1=="MODI"){
			 							echo "<div class='row'>
												<div class= col-md-5></div>
													<div class= col-md-3>
			 											<div style='color:#00FF00;'>
			 												<P> USUARIO MODIFICADO</P>
			 											</div>
			 										</div>
												<div class= col-md-4></div>
											   </div>";}

				
		if ($as2=="ERROR2"){ 
			
			echo "
			<div class='row'>
				<div class= col-md-5></div>
					<div class= col-md-3>
									<img src='../images/ERRORES/error2.jpg' width='15%' height='5%'>
									 <div style='color:#00FF00;'>
											 	<P>EL CLIENTE NO EXISTE</P>
											</div></tr>
					</div>
				<div class= col-md-4></div></div>";

		}?>
		</div>
		<div class="row">
			<div class="col-xs-6 col-md-4 col-sm-4"></div>
				<div class="col-xs-6 col-md-3 col-sm-4">
					<!--<input class="form-control" id="nombre" name="N_CLIENTE" class="mayusculas"/>-->

					 <input  class="form-control " id="nombre" name="nombre"  class="mayusculas" required>
	        			<script>
	        					var elemento = document.getElementById('nombre');
	        					
	        					new Awesomplete(elemento,{
	        						list: arrayusersJS,

	        					});
				       </script>

				</div>
				<div class="col-xs-6 col-md-5 col-sm-4"></div>
		 </div>
		 </br>
		 </form>
		 <div class="row">
			<div class="col-xs-7 col-md-5 col-sm-5"></div>
			<div class="col-xs-5 col-md-2 col-sm-4">
					<button class="btn btn-warning btn-sm" type="submit" value="BUSCAR" >Buscar</button>

						
					<button  onclick="cambiar()" class="btn btn-default btn-sm">&nbsp&nbspcrear&nbsp</button>
			</div>	

			<div class="col-xs-6 col-md-5 col-sm-3"></div>

			
		 </div>
</div>

<div id="zona_inferior" name="zona_inferior" class="hide">
	<h2 style="text-align:center">Datos de cliente</h2>
	<div class="row FormurarioIndex">

	<form action="crearmodificliente.php" id="formularioinferior"  name ="formularioinferior" method="post" accept-charset="utf-8"  >
		<div class="col-md-4">Nombre de Cliente<br>
			<input class="form-control " type="text" name="N_CLIENTE" value="<?PHP echo $nom; ?>"" placeholder="nombre de cliente" required>
		</div>
		<div class="col-md-4">
			CONTACTOS<br>			
			<input class="form-control" size="60px" type="text" name="CONTACTOS" value="<?PHP echo $con ?>" class="mayusculas" /><br/>
		</div>
		<div class="col-md-4">
			DIRECCIÓN <br>
			<input class="form-control" size="60px"type="text" name="CALLE" value="<?PHP echo $cal ?>"  class="mayusculas" /><br/>
		</div>
		<div class="col-md-2"></div>
		<div class="col-md-4">
			TELEFONO <br> 
			<input class="form-control" type="text" name="TELEFONO" value="<?PHP echo $tel ?>" pattern="^[0-9]{9}$" /><br/>
		</div>
		<div class="col-md-4">
			MAIL <br>
			<input class="form-control" type="text" name="MAIL" placeholder="email@email.com" value="<?PHP echo $mai ?>"  pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$"/>
		</div>
		<div class="col-md-2"></div>
		</div>

	</form>
	<div style="text-align:center"><br><input  class="mayusculas btn btn-primary " type="submit" name="enviar" value="&nbsp&nbsp CREAR &nbsp&nbsp&nbsp"/>  
		<input  class="mayusculas btn btn-primary " type="button" value="MODIFICAR" name="enviar" onclick="aa( countvisib )" /></br></br><button  onclick="cambiar()" class="mayusculas btn btn-info">Busquedas</button></div>


</div>




				


