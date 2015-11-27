<!DOCTYPE html>


<html>
<?PHP
##
##COMO HE PUESTO EN LEEME ESTE FORMULARIO ESTA BASADO EN UNO QUE TENIA DE JS ASI QUE SOBRAN MUCHAS LINEAS,
##PODEIS CREAR EL VUESTRO CON LA UNICA RESTRICCION DE ENVIAR LOS MISMOS DATOS IMPUT A VALIDAR_USUARIO
##
if( isset($_GET['log']))
{
$log=$_GET['log'];

}else{
$log="";
}
?>
<head>

  <meta charset="UTF-8">

  <title>CodePen - Login Form</title>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

</head>

<body>
<div id="toggle-login">

 <!--<a href="crear.php" class="button1" >crear usuario</a>-->
  <span href="#" class="button" >Log in</span>
 
</div>
<div id="login">
<?PHP  if ($log=="ERROR1"){ echo "<div style='color:#00FF00;'><P>EL CLIENTE NO EXISTE</P></div>";}?>
  <div id="triangle"></div>
  <h1>Log in</h1>
  <form action="validar_usuario.php" method="post">
  
    <input type="email" placeholder="Email" name="Email" required/>
    <input type="password" placeholder="Password" name="Password" required/>
    <input type="checkbox" name="nocsesion">No cerrar sesión </br></br>
	<input type="submit" value="Log in" />
	
  </form>
</div>

  <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>

  <script src="js/index.js"></script>

</body>

</html>