<html>
	<head></head>
		<body>

		<?PHP

include("funciones/funciones.php");

		$cliente2=$_POST['N_CLIENTE'];
		$contactos2=$_POST['CONTACTOS'];

			if( isset($_POST['N_TECNICO'])){
				$n_tecnico2=$_POST['N_TECNICO'];
			}

		$soporte2=$_POST['SOPORTE'];
		$hora_inicio2=$_POST['HORA_INICIO'];

			if( isset($_POST['HORA_FIN'])){
				$hora_fin2=$_POST['HORA_FIN'];
			}

		$fecha2=$_POST['FECHA'];

			if( isset($_POST['TEXTO'])){
				$tex2=$_POST['TEXTO'];
			}

			if( isset($_POST['PIEZAS'])){
				$piezas2=$_POST['PIEZAS'];
			}
			$srv=$_POST['srv'];
			if( isset($_POST['INCIDENCIA'])){
				$Incidencia2=$_POST['INCIDENCIA'];
			}

		include("conexion.php");//se incluyen los datos para realizar la conexion a su base de datos

		?>
		<div nombre="nuevo">
			<?PHP
			#########BUSCAR SI EL CLIENTE EXISTE

			$existe = mysqli_query ($conexion,"select * from clientes where cliente='$cliente2'" )
				or die("Error en la consulta SQL1");						
				
			$numero_filas = mysqli_num_rows($existe);


				if ($numero_filas == 0) {


					#Cerramos la conexión con la base de datos
					mysqli_close($conexion);
					header('location:index.PHP?error=error1');

				}elseif( $srv == 0){

						
					#########crear servico normal
					$crea = mysqli_query ($conexion,"INSERT INTO `servicios`(`N_CLIENTE`, `CONTACTOS`, `TECNICO`, `SOPORTE`, `HORA_INICIO`,
					 `HORA_FIN`, `FECHA`, `TEXTO`, `PIEZAS`) VALUES ('$cliente2','$contactos2','$n_tecnico2','$soporte2','$hora_inicio2','$hora_fin2','$fecha2','$tex2','$piezas2')")
					or die("Error en la consulta SQL");
					header('location:index.php');
				}else{
						
					#########crear servicio activo
					$hora=date('H:i'); 
					$fech=date('Y-m-d');
					echo "$Incidencia2";
					
					$crea = mysqli_query ($conexion,"INSERT INTO `servicios`(`N_CLIENTE`, `CONTACTOS`,`SOPORTE`, `HORA_INICIO`,
					`FECHA`,`Incidencia`,`Estado`) VALUES ('$cliente2','$contactos2','$soporte2','$hora_inicio2','$fecha2','$Incidencia2','activo')")
					or die("Error en la consulta SQL");
					echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
					# ################################### #

					#Cerramos la conexión con la base de datos
					mysql_close($conexion);

				}

			?>
		</div>
	</body>
</html>