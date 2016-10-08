<?php include("../funciones/comun.php");
      include("../funciones/funciones.php");
      Menu("index",$srva);
function paneles($titulo, $body){
  echo "<div class='col-md-2'>
        <div class='panel panel-primary'>
            <div class='panel-heading'>$titulo</div>
            <div class='panel-body'>
              $body
            </div>
          </div>
        </div>";
}
echo "<div class='col-md-1'></div>";
//if (LOGIN == 0){echo "usuario comun<br>";}
if (REPORT == true ){paneles("Reports", "activados");}else{paneles("Reports", "desactivados");};
if (LOGS == true ){paneles("Logs", "activados");}else{paneles("Logs", "desactivados");};



paneles("Filas index", ""+FILASINDEX);
$nivelborrado = "undefinid";
	if (NIVELBORRAR == 0){ $nivelborrado = "cualquier usuario";}
	if (NIVELBORRAR == 1){ $nivelborrado = "solo admin";}
	if (NIVELBORRAR == 2){ $nivelborrado = "nadie puede borrar";}

paneles("Nivel borrado", $nivelborrado);





if (NIVEL == 1) {
	paneles("Tipo de  Usuario", "ADMIN");
}else{
	paneles("Tipo de  Usuario", "NORMAL");
}
echo "<div class='col-md-1'></div>";
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
        <div class=" col-md-3">   
       </div>
        <div class=" col-md-3" >Relog index<br>
          <select name="relog" sice="" class='form-control'>
              <option></option>
              <option>Activado</option>
              <option>Desactivado</option>
          </select> 
        </div>
        <div class=" col-md-2">Tiempo Relog index<br>
          <input  class="form-control"class="form-control" type="number" name="tiempoindex"  value=""/>
        </div>
                <div class=" col-md-5">   
       </div>
      </div></br></br>
      <div style="text-align:center"><br><input  class="mayusculas btn btn-primary " type="submit" value="&#8195&#8195Modificar&#8195&#8195"/></div>
    </form>

