<html>
	<head></head>
		<body>

<?php include("../funciones/comun.php");
      include("../funciones/funciones.php");

		$cliente2=$_POST['N_CLIENTE'];
		$contactos2=$_POST['CONTACTOS'];

			if( isset($_POST['N_TECNICO'])){
				$n_tecnico2=$_POST['N_TECNICO'];
			}else{
				$n_tecnico2= null;
			}

		$soporte2=$_POST['SOPORTE'];
		$hora_inicio2=$_POST['HORA_INICIO'];

			if( isset($_POST['HORA_FIN'])){
				$hora_fin2=$_POST['HORA_FIN'];
			}else{
				$hora_fin2 = null;
			}

		$fecha2=$_POST['FECHA'];

			if( isset($_POST['TEXTO'])){
				$tex2=$_POST['TEXTO'];
			}else{
				$tex2= null;
			}

			if( isset($_POST['PIEZAS'])){
				$piezas2=$_POST['PIEZAS'];
			}else{
				$piezas2= null;
			}

			if( isset($_POST['ser'])){
				$ser = $_POST['ser'];
			}else{
				$ser = null;
			}
			if( isset($_POST['INCIDENCIA'])){
				$Incidencia2=$_POST['INCIDENCIA'];
			}else{
				$Incidencia2= null;
			}

		include("../funciones/conexion.php");//se incluyen los datos para realizar la conexion a su base de datos

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

				}elseif( $ser == null){

						
					#########crear servico normal
					$crea = mysqli_query ($conexion,"INSERT INTO `servicios`(`N_CLIENTE`, `CONTACTOS`, `TECNICO`, `SOPORTE`, `HORA_INICIO`,
					 `HORA_FIN`, `FECHA`, `TEXTO`, `PIEZAS`) VALUES ('$cliente2','$contactos2','$n_tecnico2','$soporte2','$hora_inicio2','$hora_fin2','$fecha2','$tex2','$piezas2')")
					or die("Error en la consulta SQL2");
					header('location:index.php');
				}else{
						echo $cliente2."</br>";
echo $contactos2."</br>";
echo $soporte2."</br>";
echo $hora_inicio2."</br>";
echo $fecha2."</br>";
echo $Incidencia2."</br>";
					#########crear servicio activo
					$hora=date('H:i'); 
					$fech=date('Y-m-d');
					header('location:index.php');
					
					$crea = mysqli_query ($conexion,"INSERT INTO `servicios`(`N_CLIENTE`, `CONTACTOS`, `SOPORTE`, `HORA_INICIO`,
					 `HORA_FIN`, `FECHA`, `Estado`) VALUES ('$cliente2','$contactos2','$soporte2','$hora_inicio2','$hora_fin2','$fecha2', 'activo')")
					or die("Error en la consulta SQL2");

					//echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
					# ################################### #


					#Cerramos la conexión con la base de datos
					

				}

			?>
		</div>
	</body>
</html>