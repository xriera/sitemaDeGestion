/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

validarCamposObligatorios();
validarCamposObli();
function validarCamposObligatorios(){
    
    var bandera = true
    for(var i = 0; i < document.forms[0].elements.length; i++){
        var elemento = document.forms[0].elements[i]
        if(elemento.value == '' && element0.type == 'text'){
           
            if(elemento.id == 'cedula'){
                document.getElementById('mensajeCedula').innerHTML = '<br>la CEDULA ESTA VACIA'
            }
            elemeto.style.border = '1px red solid'
            elemento.className = 'error'
            bandera = false
            
        }
    }

    return bandera
}
function validarCamposObli(formulario01){
	var cont = 0;
	for (var i =0; i < formulario.length-2; i++){
		var elemento = formulario.elements[i];
		
		if(elemento.value == null || elemento.value == ''){
			cont++
			elemento.style.border = "2px solid red";
            document.getElementById('mensaje').innerHTML = 'Campo Obligatorio';
		}else{
              
        }
        
     
    }
}
