<?php 

$arr_Tecnicos_orig= array(0 => "tecnnico1",1 => "tecnnico2");

function option($value,$count){
    if ($value != "") echo "<option>$value</option>";
      elseif ($count == 0) echo "<option></option>";
}

 function mostrar_select($arr,$name,$tamaño){
    echo "<div class=' col-md-$tamaño'>$name<br>
           <select class='form-control' class='mayusculas' name='$name'pattern='|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|'required>";
        $count= 0;
        foreach ($arr as $key => $value) {
              option($value,$count);
              $count++;
        }
    echo"   </select>
          </div>";
}

function Element_tabla($row,$act){
  if($act == "Estado"){ 
    echo "<td style='color: red'>"; 
  }else{
    echo "<td>";
  } 
  echo "<div style='text-transform: uppercase'>";
  echo $row [ "$act" ];
  $ret=$row [ "$act" ];
  echo "</div></td>";
  return $ret;
} 	

 ?>