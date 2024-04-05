// Define el titulo del alert
var ALERT_TITLE = "Advertencia!";
var ALERT_BUTTON_TEXT = "Ok";

//Sobreescribe la función alert solo en caso de browsers nuevos
if(document.getElementById) {
    window.alert = function(txt) {
        createCustomAlert(txt);
    }
}

function createCustomAlert(txt) {
    // referencia al objeto
    d = document;

    // Si existe el elemento modalContainer, retorna
    if(d.getElementById("modalContainer")) return;

    // Crea el div modalContainer como un hijo de Body
    mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
    mObj.id = "modalContainer";
	// Calcula el alto de la pantalla
    mObj.style.height = document.documentElement.scrollHeight + "px";

    //Crea el DIV de alerta
    alertObj = mObj.appendChild(d.createElement("div"));
    alertObj.id = "alertBox";
    // Posiciona el alert. MSIE no funciona del todo correcto, por eso esto
    if(d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
	// Centro
    alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth)/2 + "px";
	// Lo separo del margen superior
	alertObj.style.top = 100 + "px";

	// Crea un H1 como titlebar
    h1 = alertObj.appendChild(d.createElement("h1"));
    h1.appendChild(d.createTextNode(ALERT_TITLE));

    // Crea el texto de adentro del alert
    msg = alertObj.appendChild(d.createElement("p"));
    msg.innerHTML = txt;
    
    // create an anchor element to use as the confirmation button.
    btn = alertObj.appendChild(d.createElement("a"));
    btn.id = "closeBtn";
    btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
    btn.href = "#";
    // set up the onclick event to remove the alert when the anchor is clicked
    btn.onclick = function() { removeCustomAlert();return false; }

    
}

// removes the custom alert from the DOM
function removeCustomAlert() {
    document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
}
