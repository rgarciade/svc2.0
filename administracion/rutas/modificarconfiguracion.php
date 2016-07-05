<?php
include("../../stecnico/funciones/config.php");
	if( isset($_POST['reports'])){
  		$Mreport=$_POST['reports'];
  	}
switch ($Mreport) {

	case 'Activado':
		$Mreport = "true";
		break;
	case 'Desactivado':
		$Mreport = "false";
		break;
	default:
		if (REPORT == true ){$Mreport = "true";}else{$Mreport = "false";}
		break;
}

	if( isset($_POST['logs'])){
		$Mlog=$_POST['logs'];
  	}
switch ($Mlog) {
	case 'Activado':
		$Mlog = "true";
		break;
	case 'Desactivado':
		$Mlog = "false";
		break;
	default:
		if (LOGS == true ){$Mlog = "true";}else{$Mlog = "false";}
		break;
}

    if( isset($_POST['nivel'])){
  		$nivel=$_POST['nivel'];
  	}
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
if( isset($_POST['filasindex'])){
		$Mfilas=$_POST['filasindex'];
	}
	echo "caca111= ";echo $Mfilas;


echo "reports";echo $Mreport;
echo "<br>logs";echo $Mlog;
echo "<br>nivel";echo $nivel;

$Mlogin = "false";

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
?>
