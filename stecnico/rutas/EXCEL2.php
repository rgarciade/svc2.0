<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<?PHP #DATOS MODIFICAR
  include("../funciones/conexion.php");//se incluyen los datos para realizar la conexion a su base de datos
  include("../funciones/funciones.php");

   $usu=$_GET['usu'];
   $fe1=$_GET['fe1'];
   $fe2=$_GET['fe2'];

header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment;filename=\"$usu\"\"$fe1\"\"$fe2\"\".xls");
header('Cache-Control: max-age=0');
?>
<table  border=1 >
    <tr>
      <td>N_CLIENTE</td>
      <td >CONTACTOS</td>
      <td >TECNICO</td>  
      <td >SOPORTE</td>
      <td >HORA_INI</td>  
      <td >HORA_FIN</td>
      <td >FECHA</Td>
      <td >TEXTO</td>  
      <td >PIEZAS</td>
      <td >N_SERVICIO</td>
        
    </tr>
    <?php
     /* Ejemplo 1 generando excel desde mysql con PHP
        @Autor: Carlos Hernan Aguilar Hurtado
     */
    $sql = "SELECT * FROM `servicios` WHERE N_CLIENTE='$usu'
     AND FECHA <= '$fe2' AND FECHA>='$fe1' ORDER BY FECHA DESC,HORA_FIN DESC";

     $resultado = mysqli_query ($conexion,$sql) or die (mysqli_error ());
     $registros = mysqli_num_rows ($resultado);
      
     if ($registros > 0) {
             require_once '../Classes/PHPExcel.php';
              $objPHPExcel = new PHPExcel();
              
             //Informacion del excel
             $objPHPExcel->
              getProperties()
                  ->setCreator("ingenieroweb.com.co")
                  ->setLastModifiedBy("ingenieroweb.com.co")
                  ->setTitle("Exportar excel desde mysql")
                  ->setSubject("Ejemplo 1")
                  ->setDescription("Documento generado con PHPExcel")
                  ->setKeywords("ingenieroweb.com.co  con  phpexcel")
                  ->setCategory("ciudades");    
           
             $i = 1;    
             
             while ($row = mysqli_fetch_array ($resultado)) {
                      echo "<tr>";

                      echo "<td>";
                      echo $row [ "N_CLIENTE" ];
                           $cli=$row [ "N_CLIENTE" ];
                      echo "</div></td>";

                      echo "<td>";
                      echo $row [ "CONTACTOS" ];
                           $con=$row [ "CONTACTOS" ];
                      echo "</div></td>";

                      echo "<td>";
                      echo $row [ "TECNICO" ];
                           $tec=$row [ "TECNICO" ];
                      echo "</td>";

                      echo "<td>";
                      echo $row [ "SOPORTE" ];
                           $sop=$row [ "SOPORTE" ];
                      echo "</td>";

                      echo "<td>";
                      echo $row [ "HORA_INICIO" ];
                           $hini=$row [ "HORA_INICIO" ];
                      echo "</td>";

                      echo "<td>";
                      echo $row [ "HORA_FIN" ];
                           $hfin=$row [ "HORA_FIN" ];
                      echo "</td>";
                      echo "<td>";
                      echo $row [ "FECHA" ];
                           $fech=$row [ "FECHA" ];
                      echo "</td>";

                      echo "<td>";
                      echo $row [ "TEXTO" ];
                           $tex=$row [ "TEXTO" ];
                      echo "</div></td>";

                      echo "<td>";
                      echo $row [ "PIEZAS" ];
                           $pie=$row [ "PIEZAS" ];
                      echo "</div></td>";

                      echo "<td>";
                      echo $row [ "NUM_SERVICIO" ];
                      	   $ser=$row [ "NUM_SERVICIO" ];

                      echo "</td>";
               }
          }
?>
    </tr>
</table>
<?php
exit;
mysql_close ($conexion);
?>