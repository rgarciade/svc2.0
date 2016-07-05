<?php
include("../funciones/comun.php");


function GestionConf($var,$const){
	if( isset($_POST[$var])){
		$Vvar=$_POST[$var];
		switch ($Vvar) {

			case 'Activado':
				$Vvar = "true";
				break;
			case 'Desactivado':
				$Vvar = "false";
				break;
			default:
				if ($const == true ){$Vvar = "true";}else{$Vvar = "false";}
				break;
		}
	}
	return $Vvar;
}

$Mlogin		= GestionConf("acceso",LOGIN);
$Mreport	= GestionConf("reports",REPORT);
$Mlog 		= GestionConf("logs",LOGS );

if( isset($_POST['nivel'])){
	$nivel=$_POST['nivel'];
	switch ($nivel) {

		case 'Nadie':
			$Mnivel = 2;
			break;
		case 'Cualquiera':
			$Mnivel = 0;
			break;
		case 'Solo admin':
			$Mnivel = 1;
			break;
		default:
			$Mnivel = ""+NIVELBORRAR;
			break;		
	}
}

if( isset($_POST['filasindex'])){
	$Mfilas=$_POST['filasindex'];
	if ($Mfilas == "") {
		$Mfilas = FILASINDEX;
	}
}

$file = fopen("../../stecnico/funciones/config.php", "w");
fwrite($file, "<?php" . PHP_EOL);
fwrite($file, "//#### ERRORES" . PHP_EOL);
fwrite($file, "//Gestion de errores" . PHP_EOL);
fwrite($file, "define('REPORT',$Mreport);" . PHP_EOL);
fwrite($file, "//reportes por log, on activo true, false" . PHP_EOL);
fwrite($file, "define('LOGS',$Mlog);" . PHP_EOL);
fwrite($file, "//#### LOGIN" . PHP_EOL);
fwrite($file, "//login log, on activo true, false" . PHP_EOL);
fwrite($file, "define('LOGIN',$Mlogin);" . PHP_EOL);

fwrite($file, "//array de soporte" . PHP_EOL);
fwrite($file, "//## exstraso" . PHP_EOL);
fwrite($file, "// filas mostradas en el index" . PHP_EOL);
fwrite($file, "define('FILASINDEX',$Mfilas);" . PHP_EOL);
fwrite($file, "// BORRAR SERVICIOS" . PHP_EOL);
fwrite($file, "	//nivel minimo de borrado, si no hay login y quieres borrar poner nivel de borrado a 0" . PHP_EOL);
fwrite($file, "	//nivel 0 cualquier usuario, nivel 1 solo admin admin,2 no permite borrar a nadie" . PHP_EOL);
fwrite($file, "define('NIVELBORRAR',$Mnivel);" . PHP_EOL);
fwrite($file, "?>" . PHP_EOL);
fclose($file);
header('location:../../stecnico/rutas');

?>
