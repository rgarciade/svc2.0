<?php include("../funciones/comun.php");
      include("../funciones/funciones.php");
      Menu("usuarios",$srva);
function panelesUsuarios($titulo, $body){
  echo "<div class='col-md-2'>
        <div class='panel panel-primary'>
            <div class='panel-heading'>$titulo</div>
            <div class='panel-body'>
             $body 
             <select name='logs' sice='' class='form-control'>
              <option></option>
              <option>Usuario normal</option>
              <option>Admin</option>
          </select> 
            </div>
          </div>
        </div>
        ";
}

panelesUsuarios("aa", "bb");
panelesUsuarios("aa", "bb");