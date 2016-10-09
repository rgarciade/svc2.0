<?PHP
include("../../config/conexion.php");
 #DATOS MODIFICAR
#RECOJE EL VALOR ENVIAR DE CLIENTE
 	
 	$usu=$_POST['N_CLIENTE'];
	$cal=$_POST['CALLE'];
	$tel=$_POST['TELEFONO'];
	$mal=$_POST['MAIL'];

	if( isset($_POST['enviar'])){
		$acc=$_POST['enviar'];
	}

	if( isset($_POST['CONTACTOS'])){
		 $con=$_POST['CONTACTOS'];
		}else{
			$con="";
			$cal="";
			$tel="";
			$mal="";
	} 
?>

<?php #CONEXION

	#Conectamos con MySQL
	include("../funciones/conexion.php");//se incluyen los datos para realizar la conexion a su base de datos
	
	#Seleccionamos la base de datos a utilizar

# ################################### #
?>
<?php #CONSULTA		

	if ($acc =="CREAR" ){
							##############################
							#crear la consulta SQL####
							#############################

			$existe = mysqli_query ($conexion,"select * from clientes where cliente='$usu'" )
				or die("Error en la consulta SQL1");						
				
			$numero_filas = mysqli_num_rows($existe);


			if ($numero_filas == 1) {
					#Cerramos la conexión con la base de datos
					mysqli_close($conexion);
					header('location:CLIENTES.PHP?as=error1');
			}else{
					$ins =  mysqli_query ($conexion,"INSERT INTO `clientes` (`cliente`,`contacto`,`telefono`,`calle`,`correo`)
						values ('$usu','$con','$tel','$cal','$mal')")				
						or die("Error en la consulta SQL crear cliente2");
					#Cerramos la conexión con la base de datos
					mysqli_close($conexion);
					header('location:CLIENTES.PHP?cr=b');
			}
	}
	if ($acc =="MODIFICAR" ){
							##############################
							#MODIFICAR  consulta SQL####
							#############################
			$existe = mysqli_query ($conexion,"select * from clientes where cliente='$usu'" )
				or die("Error en la consulta SQL3");						
				
			$numero_filas = mysqli_num_rows($existe);

			if ($numero_filas == 1) {

				$modi =  mysqli_query ($conexion,"update `clientes` set `correo`='$mal', `contacto`='$con',`telefono`='$tel',
				 				`calle`='$cal' WHERE cliente='$usu'")				
								or die("Error en la consulta SQL modificar4 ");


				#Cerramos la conexión con la base de datos
				header('location:CLIENTES.PHP?as=MODI');
				mysqli_close($conexion);

				
			}else{


				#Cerramos la conexión con la base de datos
				mysqli_close($conexion);
				header('location:CLIENTES.PHP?as=error2');
				}
	}

?>
