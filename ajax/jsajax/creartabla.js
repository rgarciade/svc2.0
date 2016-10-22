
var nombreboton = 0;
function creartd(variable,variable2,nboton,array1){

variable =variable.toUpperCase();
    var table = document.getElementById("tablabot");
    var row = table.insertRow(1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    var cell7 = row.insertCell(6);
    var cell8 = row.insertCell(7);
    var cell9 = row.insertCell(8);
    var cell10 = row.insertCell(9);

    var cell11 = row.insertCell(10);

    var cell12 = row.insertCell(11);

   
    

    cell1.innerHTML = variable;
    cell2.innerHTML = "";
	cell3.innerHTML = "";
	cell4.innerHTML = "";
	cell5.innerHTML = "";
	cell6.innerHTML = "";
	cell7.innerHTML = "";
	cell8.innerHTML = variable2;
	cell9.innerHTML = "";

	
	cell10.innerHTML = "1";
	cell11.innerHTML = "";

	 var formulario = crearformulario(array1,cell12,nboton);

    var x =document.createElement("BUTTON");
    	x.setAttribute("id", nboton);
    	x.setAttribute("type", "submit");
    	x.setAttribute("class", "mayusculas btn btn-success glyphicon glyphicon-pencil" );
      formulario.appendChild(x);


}
function crearinput(nform,form,nombre){

	  var  inputt = document.createElement("INPUT");
     inputt.setAttribute("type", "hidden");
     inputt.setAttribute("name", nombre);
     inputt.setAttribute("value", nombre);


    document.getElementById(nform).appendChild(inputt);
}

function crearformulario(array,cell,nform){

    var form = document.createElement("FORM");
    form.setAttribute("id", nform);
    form.setAttribute("method", "post");

    cell.appendChild(form);

    for(let i=0; i<array.length; i++){
    	crearinput(nform,form,array[i]);
    }
 return cell;
}

	function enviarDatos(arraytipos,array1){
		/*var nombre = document.getElementById(v_nombre).value;
		var texto = document.getElementById(v_texto).value;
		*/


		//v_nombre,v_texto,
		var arraytipos1 = [];
		
		for (var i = 0; i < arraytipos.length; i++) {
			arraytipos1[i]=arraytipos[i];
			arraytipos[i] = document.getElementById(arraytipos[i]).value;
		}
		
		var nombre = document.getElementById(arraytipos1[0]).value;
		var texto = document.getElementById(arraytipos1[1]).value;

		var contacto ="a";
		var tecnico ="b";
		var soporte = "c";
		var horaini = null;
		var horafin = null;
		var fecha = null;
		var piezas ="d";

		



		$.ajax({
			type:'POST',
			url:'conectar.php',
			data:('nombre='+nombre+'&texto='+texto+'&contacto='+contacto+'&tecnico='+tecnico+'&soporte='+soporte+'&horaini='+horaini+'&horafin='+horafin+'&fecha='+fecha+'&piezas='+piezas),
			success:function(respuesta) {
				if (respuesta==200) {
					$('#estado').html('enviadoo');
					
					creartd(nombre,texto,"boton"+nombreboton,array1);
					
					crearformulario(array1,"boton"+nombreboton);
					nombreboton++;

				}else{
					$('#estado').html('error');
				}
			}
			
		});
	};

