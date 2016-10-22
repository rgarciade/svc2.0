<?php 

      $arrayusers = array();
      $con = "select cliente from clientes";//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
      $query = mysqli_query($conexion,$con)or die("error_consulta");

           while( $row = mysqli_fetch_array ( $query )) {
	        	$row [ "cliente" ];
	        	$var_inclu=$row [ "cliente" ];

	        	array_push($arrayusers, $var_inclu);

			}

 ?>
<script type="text/javascript">
    // obtenemos el array de valores mediante la conversion a json del
    // array de php
    var arrayusersJS=<?php echo json_encode($arrayusers);?>;
 
    // Mostramos los valores del array
   /* for(var i=0;i<arrayusersJS.length;i++)
    {
        document.write("<br>"+arrayusersJS[i]);
    }*/
</script>

 