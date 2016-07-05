
<meta http-equiv="refresh" content="60">
<?php include("../funciones/comun.php");
      include("../funciones/funciones.php");
      Menu("index",$srva);

if (LOGIN == 0){echo "usuario comun<br>";}
if (REPORT == true ){echo "Reports = activados <br>";}else{echo "Reports = desactivados <br>";};
if (LOGS == true ){echo "logs = activados <br>";}else{echo "Logs = desactivados <br>";};
echo "FILAS DEL INDEX=";echo ""+FILASINDEX;echo "<br>";
echo "NIVEL BORRADO=";
	if (NIVELBORRAR == 0){ echo "cualquier usuario";}
	if (NIVELBORRAR == 1){ echo "solo admin";}
	if (NIVELBORRAR == 2){ echo "nadie puede borrar";}
echo "<br>";


if (NIVEL == 1) {
	echo "ADMIN";

}else{
	echo "NORMAL";
}
  ?>  <form action="modificarconfiguracion.php" method="post" accept-charset="utf-8" class="form-group">
      <div class="row FormurarioIndex">
        <div class=" col-md-3">Reports<br>
          <select name="reports" sice="" class='form-control'>
              <option></option>
              <option>Activado</option>
              <option>Desactivado</option>
          </select> 
        </div>
        <div class=" col-md-3">Logs<br>
          <select name="logs" sice="" class='form-control'>
              <option></option>
              <option>Activado</option>
              <option>Desactivado</option>
          </select> 
        </div>
        <div class=" col-md-2">Nivel borrado<br>
          <select name="nivel" sice="" class='form-control'>
              <option></option>
              <option>Nadie</option>
              <option>Cualquiera</option>
              <option>Solo admin</option>
          </select> 
        </div>

        <div class=" col-md-2">Filas mostradas index<br>
			<input  class="form-control"class="form-control" type="number" name="filasindex"  value=""/>
     	</div>
       <div class=" col-md-2">Control de acceso<br>
          <select name="acceso" sice="" class='form-control'>
              <option></option>
              <option>Activado</option>
              <option>Desactivado</option>
          </select> 
        </div>
      </div>
      <div style="text-align:center"><br><input  class="mayusculas btn btn-primary " type="submit" value="&#8195&#8195Modificar&#8195&#8195"/></div>
    </form>

