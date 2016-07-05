<?php
//#### ERRORES
//Gestion de errores
define('REPORT',false);
//reportes por log, on activo true, false
define('LOGS',false);
//#### LOGIN
//login log, on activo true, false
define('LOGIN',false);
//array de soporte
//## exstraso
// filas mostradas en el index
define('FILASINDEX',15);
// BORRAR SERVICIOS
	//nivel minimo de borrado, si no hay login y quieres borrar poner nivel de borrado a 0
	//nivel 0 cualquier usuario, nivel 1 solo admin admin,2 no permite borrar a nadie
define('NIVELBORRAR',0);
?>
