<?PHP

include ("conexion.php");
 #CONEXION VARIABLES Y CONDICIONES
 
                ##### ##### ##### ##### #    
                #####   variables   #####
				##### ##### ##### ##### #  

 # TIEMPO DE VIDA DE LA COOKIE y destino al loguearte
	# 1º tiempo de duracion de la cookie de id sesion "ms"
			$tiempo=31104000;
	
		#destino despues de validar
			$ddv="location:./stecnico/rutas";
		
	
  # variables obtenidas en el formulario del index y pasadas por post
	
if( isset($_POST['user'])){
	$usu=$_POST['user'];

}else{
	$usu="";
	
}
if( isset($_POST['Password'])){
	$pass=$_POST['Password'];

}else{
	$pass="";
	
}
## NOCSESION SERA DISTINTO DE "" CUANDO EN EL FORMULARIO HAYAMOS MARCADO LA OPCION DE PERMANECER CONECTADO 
if( isset($_POST['nocsesion'])){
	$nocsesion=$_POST['nocsesion'];

}else{
	$nocsesion="";

}



						# ################################### #
						#CONSULTA		
						##############################
						#BUSCAR RANGO SQL####
						#############################
echo "hola1";
$consulta1 = mysqli_query($conexion,"SELECT * FROM `usuarios` WHERE nombre='$usu' AND pass='$pass' ") 
							or die("Error en la consulta SQL 1");						
######
##### COMPROVAMOS EL  nªfilass DEL RESULTADO DE LA SELECT, SI ES DISTINTO DE 0 EL USUARIO EXISTE Y LA CONTRASEÑA ES VALIDA
###
$numero_filas = mysqli_num_rows($consulta1);
if ($numero_filas == 0 ) {
		##"no hay registros"    FALLO EN LA AUTENTIFICACION, volvemos a la pagina login
		#Cerramos la conexión con la base de datos

		mysqli_close($conexion);

		header('location:index.php?log=ERROR1');

}else{
		##SI EL USUARIO EXISTE       AUTENTIFICACION CORRECTA  creamos sesiones, y cookies si el usuario se va ha mantener iniciado. y redirigimos a la pagina objetivo
	while( $row = mysqli_fetch_array ( $consulta1 )) {

		#TIPO ES EL VALOR DEL NIVEL DEL USUARIO 0 GENERICO, 1 ADMIN EN MI CASO(PUEDES ASGNAR UN VALOR QUE TU QUIERAS O USAR BOOLEANOS)
		$nivel=$row [ "nivel" ];
 	}

		##echo "hay registros";

			##########################
			##		sesiones
			##########################
			
			session_start();
			
			$_SESSION['nivel']=$nivel;
			$_SESSION['usuario']=$usu;
			$_SESSION['clave']=$pass;
			$_SESSION['estado']= 'valido';

		if ($nocsesion != '' ){

			setcookie("ms",session_id(),time()+$tiempo);

		}else{

			setcookie("ms",session_id(),time()-$tiempo);
		}

		#redirigimos

	header($ddv);
}		
?>