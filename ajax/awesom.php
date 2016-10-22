<?php 
include "../config/conexion.php";
include "jsajax/selectuser.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="awesomplete-gh-pages/awesomplete.css" >
	<script src="awesomplete-gh-pages/awesomplete.min.js"></script>
	

</head>
<body>
	<input type="search" name="tutor" id="nameform"  class="awesomplete">


</body>
</html>


<script>
		var elemento = document.getElementById('nameform');
		console.log(arrayusersJS);
		new Awesomplete(elemento,{
			list: arrayusersJS
		});
</script>