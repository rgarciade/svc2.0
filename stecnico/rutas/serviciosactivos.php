

<?php include("../funciones/comun.php");
      include("../funciones/funciones.php");
      Menu("servicioactivo",$srva);?>
   <!--BUCLE TABLA-->
     <!--cerrar cssmenu-->
  </div>
  <!--cerrar cabecera-->
</div>
<?PHP


            ##############################
            #Efectuamos la consulta SQL####
            #############################
      $result = mysqli_query ($conexion,"SELECT * FROM servicios where Estado is not NULL order by NUM_SERVICIO DESC LIMIT 15")
      or die("Error en la consulta SQL");

            ###################################
            #Mostramos los resultados obtenidos
            ###################################
?>          

<?PHP       
while( $row = mysqli_fetch_array ( $result )) {

  
  $row [ "NUM_SERVICIO" ];

  $a=$row [ "NUM_SERVICIO" ];

  $cli=$row [ "N_CLIENTE" ];

  $con=$row [ "CONTACTOS" ];

  $sop=$row [ "SOPORTE" ];

  $hini=$row [ "HORA_INICIO" ];

  $fech=$row [ "FECHA" ];

  $inci=$row [ "Incidencia" ];

  $ser=$row [ "NUM_SERVICIO" ];

  ?>
   <!--cada tabla y formulario independiente-->






   <?php 
   ##fin del wile
}

?>
</div>




</div>


</body>