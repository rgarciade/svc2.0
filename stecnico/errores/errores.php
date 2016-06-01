<?php
include("../funciones/config.php");

function gestionderror($type,$message,$file,$line){
	$date = date("r");
	if (REPORT === true) {
	 echo "   		[-- $date --]<br>
	 		  Error de Tipo: $type  $message <br>
			  Localizado en el fichero $file .<br>
			  Localizado en la linea --> $line <br>
					  
			  ------------------------------------------------------<br>";
	}
	if (LOGS === true) {
		$log  = "
			     	[-- $date --]
			  Error de Tipo: $type .  $message
			  Localizado en el fichero $file .
			  Localizado en la linea --> $line 
			  
			  ------------------------------------------------------

			  ";
		//Save string to log, use FILE_APPEND to append.
		file_put_contents('../errores/log_'.date("j.n.Y").'.txt', $log, FILE_APPEND);
	}
}



?>