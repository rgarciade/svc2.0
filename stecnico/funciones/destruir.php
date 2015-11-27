<?PHP
session_start();
session_destroy();
setcookie("ms",session_id(),time()-31104000);		
header('location:../index.php');     
?>
