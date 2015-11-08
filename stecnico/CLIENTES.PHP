<html>
<?php include("funciones/comun.php");
      include("funciones/funciones.php");?>
	<div id='cssmenu'>
	<ul>
	   <li ><a href='index.PHP'>	<span>STECNICO</span></a></li>
	   <li CLASS='ACTIVE'><a href='CLIENTES.PHP'>	<span>CLIENTE</span></a></li>
	   <li class='last'><a href='BUSQUEDAS.PHP'>	<span>BUSQUEDAS</span></a></li>
	   
	  
	   <li class='vol'><a  href='/servicios2.0'><span>MICRO-TEX</span></a></li>
	   <li class='vol'><a  href='#' onClick="abrirVentana('CREARSERVACTIVO.PHP')"><span>NUEVO SERV ACTIVO</span></a></li>

	 <a href='SERVICIOSACTIVOS.php'><img  src='images/srvactivos/<?PHP echo $srva?>.png' width='120px' height='50px'></a>

	</ul>
	</div>
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

	?>

	<?php #CONEXION Y CONDICIONES

	if( isset($_GET['as']))
	{
	$as1=$_GET['as'];

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

			#Conectamos con mysqli
			include("conexion.php");//se incluyen los datos para realizar la conexion a su base de datos


			#Seleccionamos la base de datos a utilizar
			mysqli_select_db($conexion,"microtex")
			or die("Error en la selección de la base de datos");


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
				mysqli_close($conexion);
					header('location:CLIENTES.PHP?as2=ERROR2');
			}

			#Cerramos la conexión con la base de datos
			mysqli_close($conexion);
	}
	?>





		<div class="CSSTableGenerator" >


			<table  style="table-layout: fixed; width:100% ;height:90%";>
			<colgroup>
			<col style="width: 26px">
			<col style="width: 21px">
			<col style="width: 19px">
			<col style="width: 113px">
			<col style="width: 447px">
			</colgroup>
			  <tr style="table-layout: fixed; width:100% ;height:2%";>
			    <td class="tg-s6z2" colspan="4">BUSCAR</td>
			    <td class="tg-s6z2">DATOS</td>
			  </tr>
			  <tr>
			    <td class="tg-s6z2" colspan="4" rowspan="3" >
				<p align="center">
								<form action="CLIENTES.php" method="post" name="formulario1">
									<?PHP  
									if ($as2=="ERROR2"){ 
										echo "<img src='error2.jpg' width='15%' height='5%'> <div style='color:#00FF00;'><P>EL CLIENTE NO EXISTE</P></div>";
									}?>
								</BR>
								<h3><b>BUSCAR CLIENTE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></h3>
								<BR/>

			                       <input id="tags" name="N_CLIENTE" class="mayusculas" 
								        />
								   <input type="submit" value="BUSCAR" />
								 </form>
			        </p>
				</td>
			    <td class="tg-031e">
				

			<!--imagen error el cliente ya existe, error1-->
			<?PHP 
					 if ($as1=="error1"){ 
										echo "<img src='images/ERRORES/error1.gif' width='15%' height='25%'> <div style='color:#00FF00;'><P>EL cliente YA EXISTE</P></div>";
									}
						 	elseif ($as1=="MODI"){
						 					echo "<div style='color:#00FF00;'><P> USUARIO MODIFICADO</P></div>";
						 				}
					 if ($cr1=="b"){
					 					echo "<img src='images/tic.jpg' width='5%' height='15%'><div style='color:#00FF00;'><P> cliente CREADO </P></div>";
					 				}

			 ?>

						<form id="myform" action="CREARMODIFICLIENTE.php" method="post" onSubmit="return ValidaCampos(this)">

									   

									 NOMBRE DE CLIENTE&nbsp;
									<input  size="60px" type="text" name="N_CLIENTE" value="<?PHP echo $nom ?>" class="mayusculas" required/><br/>
									 </br></br>
										 	CONTACTOS
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										 <input size="60px" type="text" name="CONTACTOS" value="<?PHP echo $con ?>" class="mayusculas" /><br/>
									  </br></br>
										  	DIRECCIÓN 
										  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										  <input size="60px"type="text" name="CALLE" value="<?PHP echo $cal ?>" class="mayusculas" /><br/>

									 </br></br>TELEFONO 
											 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										 <input type="text" name="TELEFONO" value="<?PHP echo $tel ?>" pattern="^[0-9]{9}$" /><br/>
									  </br></br>
										  	MAIL
										  	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										 <input  type="text" name="MAIL" value="<?PHP echo $mai ?>"  pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" /><br/>
									  </br></br>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									 <input type="submit" name="enviar" value="CREAR"/>
								     <input type="submit" name="enviar"value="MODIFICAR" />
								  </form>
									  
						</form>
				</td>
			  </tr>
			  
			  

			</table>

		 
		</DIV>
	</body>
</html>