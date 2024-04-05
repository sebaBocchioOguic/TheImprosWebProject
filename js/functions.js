// JavaScript Document

// Función que devuelve el valor del radiobutton seleccionado en un form
function getRadioVal(form, name) {
        var val;
        var radios = form.elements[name];
        
        for (var i=0, len=radios.length; i<len; i++) {
            if ( radios[i].checked ) {
                val = radios[i].value;
                break;
            }
        }
        return val;
}

function objetoAjax(){
        var xmlhttp=false;
        try {
               xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
               try {
                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
               } catch (E) {
                       xmlhttp = false;
               }
        }
 
        if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
               xmlhttp = new XMLHttpRequest();

        }

        return xmlhttp;

}
