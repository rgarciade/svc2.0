<?php
//#### ERRORES

//Gestion de errores
define('REPORT',true);

//reportes por log, on activo true, false
define('LOGS',false);


//#### LOGIN
//ligin log, on activo true, false

define('LOGIN',false);
//array de soporte


//## exstras

// filas mostradas en el index
define('FILASINDEX',20);
// BORRAR SERVICIOS
define('BORRADO',true);
	//nivel minimo de borrado, si no hay login y quieres borrar poner nivel de borrado a 0
	//nivel 1 es admin nivel 0 current user
define('NIVELBORRAR',"0");
?>
