

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


  $num_servicio = $row [ "NUM_SERVICIO" ];

  $cliente = $row [ "N_CLIENTE" ];

  $contactos = $row [ "CONTACTOS" ];

  $soporte = $row [ "SOPORTE" ];

  $hora_inicio = $row [ "HORA_INICIO" ];

  $fecha = $row [ "FECHA" ];

  $tecnico = $row [ "TECNICO" ];


  $incidencia = $row [ "Incidencia" ];

  $num_de_servicio = $row [ "NUM_SERVICIO" ];

  ?>
   <!--cada tabla y formulario independiente-->


<form action="MODIFICARSERVICIO.php" method="post" class="form-group">
  <div class="row">
   
    <h2 style="text-align:center">Servicios Activos</h2>


  </div>

  <div class="row">
    <div class=" col-md-3">Nombre<br>
      <input  class="form-control"id="tags" name="N_CLIENTE"  class="mayusculas" value="<?PHP echo $cliente ?>" required>
      <br>
    </div>
  <?php //mostrar soporte 
          mostrar_select(Reorg_arr($soporte,$arr_sop,2),"SOPORTE",3);
  ?>  
    <div class=" col-md-3">Fecha <br><input  class="form-control" class="mayusculas" type="date" name="FECHA" value="<?PHP echo $fecha ?>" /></div>
    <div class=" col-md-3">Contacto <br>
      <input  class="form-control"class="form-control" type="text" name="CONTACTOS" value="<?PHP echo $contactos ?>" class="mayusculas"/>
    </div>
  </div> 
  <div class="row">
    <div class=" col-md-3">Hora Inicio<br>
      <input  class="form-control"class="form-control" class="mayusculas" type="datetime" name="HORA_INICIO"  value="<?PHP echo $hora_inicio?>"/>
    </div>
    <div class=" col-md-3">Hora Fin<br>
      <input  class="form-control" class="form-control"class="mayusculas" type="datetime" name="HORA_FIN" value="<?php echo date('H:i'); ?>" />
    </div>
    <div class=" col-md-3">Piezas<br><input class="form-control"class="mayusculas" type="text" name="PIEZAS"/></div>
  <?php 
  //mostrar tecnico
      mostrar_select(Reorg_arr($tecnico,$arr_Tecnicos_orig,5),"Tecnico",3);
  ?>
    <div class=" col-md-12"><h4 style="text-align:center">Incidencia</h4> <br><textarea class="form-control mayusculas" type="text" name="TEXTO"><?PHP echo $incidencia?></textarea></div>
   

  </div>

    <div style="text-align:center"><br><input  class="mayusculas btn btn-primary " type="submit" value="Modificar"/></div>
    <input type="hidden" name="NUM_SERVICIO" value="<?PHP echo $num_de_servicio?>">

  </div>
</form>



   <?php 
   ##fin del wile
}

?>
</div>




</div>


</body>