<?php include("funciones/comun.php");
      include("funciones/funciones.php");
      Menu("busquedas",$srva);
?>


  <!--cerrar cssmenu-->
  </div>
  <!--cerrar cabecera-->
</div>
<!--cerar comun-->

<div class="CSSTableGenerator" >

  <table style="table-layout: fixed; width: 100%">

    <tr >
          <td  colspan="5" style="table-layout: fixed; width:100% ;height:5%";>BUSCAR</td>
    </tr>
    <tr>
            <td colspan="5" rowspan="3">
    	         <form action="FORMULASBUSQUEDAS.php" method="post" name="formulario1">
                      	<?PHP  if( !isset($_GET['as'])){ 
                                          echo "<img src='images/buscar.jpg' width='10%' height='40%'>";
                      	           }else{
                                          echo "<img src='images/ERRORES/ERROR3.jpg' width='5%' height='25%'><div style='color:#00FF00;'><H2>NO SE ENCONTRARON SERVICIOS</H2></div>";
                                        }?>
                        </BR></BR></BR></BR>
                        	<H1>CLIENTE___FECHA INICIO___FECHA FIN___TECNICO__________CAMPO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </H1>
                        </BR>
                        	<input  id="tags" name="N_CLIENTE"/ class="mayusculas">
                        	<input type="date" name="FECHA1" value="<?php echo date('Y-m-d'); ?>" />
                          <input type="date" name="FECHA2" value="<?php echo date('Y-m-d'); ?>" />
                          <select name="N_TECNICO" sice=""pattern="|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|">
                                <option></option>
                                <option>JORGE</option>
                                <option>DAVID</option>
                                <option>RAUL</option>
                                <option>JOSE</option>
                          </select>	
                          
                          <select name="SBUSCAR" sice="">
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
                      	
                      	 <input type="submit" name="enviar"value="BUSCAR" />
                      	 
                </form>
      
            </TD>
      
    
    
    </tr>
  </table>
	</DIV>