
var nombreboton = 0;
function creartd(arraytipos,arraytiposnombres,formname,id,nboton,array1){

for (let i = 0; i < arraytipos.length; i++) {
	if(typeof(arraytipos[i]) == "string"){
		arraytipos[i] = arraytipos[i].toUpperCase();
	};
}
    let table = document.getElementById("tablabot");
    let row = table.insertRow(1);
    let cell1 = row.insertCell(0);
    let cell2 = row.insertCell(1);
    let cell3 = row.insertCell(2);
    let cell4 = row.insertCell(3);
    let cell5 = row.insertCell(4);
    let cell6 = row.insertCell(5);
    let cell7 = row.insertCell(6);
    let cell8 = row.insertCell(7);
    let cell9 = row.insertCell(8);
    let cell10 = row.insertCell(9);

    let cell11 = row.insertCell(10);

    let cell12 = row.insertCell(11);

   
    

    cell1.innerHTML = arraytipos[0];
    cell2.innerHTML = arraytipos[1];
	cell3.innerHTML = arraytipos[2];
	cell4.innerHTML = arraytipos[3];
	cell5.innerHTML = arraytipos[4];
	cell6.innerHTML = arraytipos[5];
	cell7.innerHTML = arraytipos[6];
	cell8.innerHTML = arraytipos[7];
	cell9.innerHTML = arraytipos[8];

	
	cell10.innerHTML = id;
	cell11.innerHTML = "";

	 let formulario = crearformulario(array1,cell12,nboton);

    let x =document.createElement("BUTTON");
    	x.setAttribute("id", nboton);
    	x.setAttribute("type", "submit");
    	x.setAttribute("onclick", "enviar_formulario()");   
    	x.setAttribute("class", "mayusculas btn btn-success glyphicon glyphicon-pencil" );
      formulario.appendChild(x);


}
function crearinput(nform,form,nombre){

	  let  inputt = document.createElement("INPUT");
     inputt.setAttribute("type", "hidden");
     inputt.setAttribute("name", nombre);
     inputt.setAttribute("value", nombre);


    document.getElementById(nform).appendChild(inputt);
}

function crearformulario(array,cell,nform){

    let form = document.createElement("FORM");
    form.setAttribute("id", nform);
    form.setAttribute("method", "post");

    cell.appendChild(form);

    for(let i=0; i<array.length; i++){
    	crearinput(nform,form,array[i]);
    }
 return cell;
}

	function enviarDatos(arrayentrada,array1,formname,id){
		

		id = id+1;


		//v_nombre,v_texto,
		let arraytiposnombres = [];
		let arraytipos = [];
		
		for (let i = 0; i < arrayentrada.length; i++) {
			arraytipos[i] = arrayentrada[i];
			arraytiposnombres[i]=arraytipos[i];
			
			arraytipos[i] = document.getElementById(arraytipos[i]).value;
		}

let datos = crear_arraypost(arraytipos,arraytiposnombres);


		$.ajax({
			type:'POST',
			url:'conectar.php',
			data:(datos),
			success:function(respuesta) {
				if (respuesta==200) {
					$('#estado').html('enviadoo');
					
					creartd(arraytipos,arraytiposnombres,formname,id,"boton"+nombreboton,array1);
					
					//crearformulario(array1,"boton"+nombreboton);
					nombreboton++;

				}else{
					$('#estado').html('error');
				}
			}
			
		});
 return id;
	};

function crear_arraypost(arraytipos,arraytiposnuevo){
	let datos = ""+arraytiposnuevo[0]+"="+arraytipos[0];

	for (let i = 1 ; i < arraytipos.length; i++) {
		if(arraytipos[i] == ""){arraytipos[i] = null;};
		datos = datos+"&"+arraytiposnuevo[i]+"="+arraytipos[i];
	}
return datos;
}
