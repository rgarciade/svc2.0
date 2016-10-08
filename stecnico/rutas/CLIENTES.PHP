
	<?php
		include("../funciones/comun.php");
		include("../funciones/funciones.php");     
      Menu("clientes",$srva);
?>
	<!--cerrar cssmenu-->
	</div>
	<!--cerrar cabecera-->
	</div>
	<!--cerar comun-->

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

 <h2 style="text-align:center">BUSCAR CLIENTE</h2>

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
			<div class=" col-md-4"></div>
				<div class=" col-md-4">
					<input class="form-control" id="tags" name="N_CLIENTE" class="mayusculas"/>
				</div>
				<div class=" col-md-2">
					<button class="btn btn-warning btn-sm" type="submit" value="BUSCAR" >Buscar</button>
				</div>
			<div class=" col-md-1"></div>
		  </div>
	</form>
<?php
	 if ($mostrar_infe === false){ 
						?>
			<div class="row">
		<div class=" col-md-4"></div>
			<div class=" col-md-4">
			
			</div>
			<div class=" col-md-2">
				<a href="./CLIENTES.php?as=activ"><button class="btn btn-default btn-sm">&nbsp&nbspcrear&nbsp</button></a>	
			</div>
		<div class=" col-md-1"></div>
	  </div>
<?php }?>
	</div>		    
</br>
			<?PHP 


			
	 if ($mostrar_infe === true){
			 ?>

				
		<h2 style="text-align:center">Datos de cliente</h2>
		<div class="row FormurarioIndex">
<form action="CREARMODIFICLIENTE.php" method="post" onSubmit="return" >
	<div class="col-md-4">Nombre de Cliente<br>
		<input class="form-control " type="text" name="N_CLIENTE"  placeholder="nombre de cliente" required>
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

	<div style="text-align:center"><br><input  class="mayusculas btn btn-primary " type="submit" name="enviar" value="CREAR"/>  
	<input  class="mayusculas btn btn-primary " type="submit" value="MODIFICAR" name="enviar"/></div>
</form>



<!--
						<form id="myform" action="CREARMODIFICLIENTE.php" method="post" onSubmit="return ValidaCampos(this)">

		 NOMBRE DE CLIENTE;
		<input  size="60px" type="text" name="N_CLIENTE" value="<?PHP echo $nom ?>" class="mayusculas" required/><br/>
		 </br></br>
			 	CONTACTOS
				
			 <input size="60px" type="text" name="CONTACTOS" value="<?PHP echo $con ?>" class="mayusculas" /><br/>
		  </br></br>
			  	DIRECCIÓN 
			  	  <input size="60px"type="text" name="CALLE" value="<?PHP echo $cal ?>" class="mayusculas" /><br/>

		 </br></br>TELEFONO 
				  <input type="text" name="TELEFONO" value="<?PHP echo $tel ?>" pattern="^[0-9]{9}$" /><br/>
		  </br></br>
			  	MAIL
			   <input  type="text" name="MAIL" value="<?PHP echo $mai ?>"  pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" /><br/>
		  </br></br>
			   <input type="submit" name="enviar" value="CREAR"/>
	     <input type="submit" name="enviar"value="MODIFICAR" />
	  </form>
	-->
				<?php } ?>
