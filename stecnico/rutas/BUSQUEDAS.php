<?php include("../funciones/comun.php");
      include("../funciones/funciones.php");
      Menu("busquedas",$srva);
?>


  <!--cerrar cssmenu-->
  </div>
  <!--cerrar cabecera-->
</div>
<!--cerar comun-->

    <div style="text-align:center">
        <?PHP 
          if( !isset($_GET['as'])){ 
            echo "<img src='../images/buscar.jpg' width='10%' height='40%'>";
          }else{
             echo "<img src='../images/ERRORES/ERROR3.jpg' width='5%' height='25%'><div style='color:#00FF00;'><H2>NO SE ENCONTRARON SERVICIOS</H2></div>";
          }
        ?>
    </div>
    <br><br><br>

    <form action="FORMULASBUSQUEDAS.php" method="post" accept-charset="utf-8" class="form-group">
      <div class="row FormurarioIndex">
        <div class=" col-md-3">Cliente<br>
          <input  id="tags" name="N_CLIENTE"/ class="form-control mayusculas">
        </div>
        <div class=" col-md-2">Fecha inicial<br>
          <input type="date" name="FECHA1" class='form-control' value="<?php echo date('Y-m-d'); ?>" />
        </div>
        <div class=" col-md-2">Fecha final<br>
          <input type="date" name="FECHA2" class='form-control' value="<?php echo date('Y-m-d'); ?>" />
        </div>
          <?php $tecnico = "RAUL"; mostrar_select(Reorg_arr($tecnico,$arr_Tecnicos_orig,5),"Tecnico",2);?>
        <div class=" col-md-3">Tipo<br>
          <select name="SBUSCAR" sice="" class='form-control'>
              <option>CLI</option>
              <option>CLI_FECHA</option>
              <option>CLI_TECNICO</option>
              <option>CLI_FECHA_TECNICO</option>
              <option>TODOS</option>
              <option>TODOS_FECHA</option>
              <option>TODOS_TECNICO</option>
              <option>TODOS_FECHA_TECNICO</option> 
              <option>IMPRIMIR</option>
          </select> 
        </div>


      </div>
      <div style="text-align:center"><br><input  class="mayusculas btn btn-primary " type="submit" value="&#8195&#8195Buscar&#8195&#8195"/></div>
    </form>



