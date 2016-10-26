<?php 
include "../../config/conexion.php";
$errordatos = false;

if( isset($_POST['nombre'])){	
	$nombre = $_POST['nombre'];
};
if( isset($_POST['texto'])){
	$texto = $_POST['texto'];
	if( $texto == "null" ){$texto = "";}
};
//"nombre=www&contactos=null&Tecnico=tecnnico1&soporte=null&horainicio=12:56&horafin=12:56&fecha=2016-10-23&texto=null&piezas=null"
if( isset($_POST['contactos'])){
	$contactos =$_POST['contactos'];
	if( $contactos == "null" ){ $contactos= "";}
};
if( isset($_POST['Tecnico'])){
	$tecnico = $_POST['Tecnico'];
	if( $tecnico == "null" ){ $errordatos = true;}

};
if( isset($_POST['soporte'])){
	$soporte = $_POST['soporte'];
	if( $soporte == "null" ){ $errordatos = true;}
};
if( isset($_POST['horainicio'])){
	$horainicio =$_POST['horainicio'];
};
if( isset($_POST['horafin'])){
	$horafin = $_POST['horafin'];
};
if( isset($_POST['fecha'])){
	$fecha   = $_POST['fecha'];
};
if( isset($_POST['piezas'])){
	$piezas  = $_POST['piezas'];
	if( $piezas == "null" ){ $piezas= "";}
};

if ($errordatos !== true ) {
	if(comprovar_exite($nombre,$conexion)){
		$consulta = "INSERT INTO `servicios`(`N_CLIENTE`, `TEXTO`, `CONTACTOS`, `TECNICO`, `SOPORTE`, `HORA_INICIO`,
						 `HORA_FIN`, `FECHA`, `PIEZAS`) VALUES (?,?,?,?,?,?,?,?,?)";
		$sentencia = mysqli_prepare($conexion, $consulta);

		mysqli_stmt_bind_param($sentencia, "sssssssss", $nombre, $texto, $contactos, $tecnico, $soporte, $horainicio, $horafin, $fecha, $piezas);

		/* Ejecutar la sentencia */
		mysqli_stmt_execute($sentencia)or die("Error en la consulta SQL2");

		echo "200";//ok
		/* cerrar la sentencia */
		mysqli_stmt_close($sentencia);
	}else{
		echo "2001";//cliente incorrecto
	}

}else{
echo "400"; //La solicitud contiene sintaxis errónea y no debería repetirse.
}

function comprovar_exite($user,$conexion){
$estado = true;

      $con = "select cliente from clientes where `cliente` = '$user'";//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
      $query = mysqli_query($conexion,$con)or die("error_consulta");

if (!mysqli_num_rows($query)) {
    $estado = false;

}

    // liberar el conjunto de resultados 
    mysqli_free_result($query);

return $estado;
}
 ?>