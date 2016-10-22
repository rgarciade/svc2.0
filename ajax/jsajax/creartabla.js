
var nombreboton = 0;
function creartd(variable,variable2,nboton){


    var table = document.getElementById("tabla");
    var row = table.insertRow(1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    

    cell1.innerHTML = variable;
    cell2.innerHTML = variable2;

    var x =document.createElement("BUTTON");
    	x.setAttribute("id", nboton);
      cell3.appendChild(x);


}
function crearinput(form,nombre){

	  var  inputt = document.createElement("INPUT");
     inputt.setAttribute("type", "hidden");
     inputt.setAttribute("name", nombre);
     inputt.setAttribute("value", nombre);


    document.getElementById("formularioboton").appendChild(inputt);
}

function crearformulario(array,nombreboton){

    var form = document.createElement("FORM");
    form.setAttribute("id", "formularioboton");
    form.setAttribute("method", "post");

    document.getElementById(nombreboton).appendChild(form);

    for(let i=0; i<array.length; i++){
    	crearinput(form,array[i]);
    }

}

	function enviarDatos(array1){
		var nombre = document.getElementById('nombre').value;
		var texto = document.getElementById('texto').value;
		

		$.ajax({
			type:'POST',
			url:'conectar.php',
			data:('nombre='+nombre+'&texto='+texto),
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

