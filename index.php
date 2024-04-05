<?php
// Valida usuario de login
include("./conexion/validacion.php");

$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : null;
?>
<!doctype html>
<html>
<head>

<meta charset="utf-8">
<meta name="description" content="The Impros">
<meta name="keywords" content="The Impros, Improvisacion, Teatro, Arte, Humor">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="Sebastian Bocchio">

	<title>The Impros</title>

	<!-- ------------------------------------------------- -->
	<!-- /////                CSS                    ///// -->
    <!-- ------------------------------------------------- -->
	<link rel="stylesheet" href="css/estilo.css">
   	<link rel="stylesheet" href="css/animaciones.css">

	<!-- CSS Calendario desactivado 
   	<link rel="stylesheet" href="css/estilo_calendario.css">   -->

	<!-- CSS Slider de Fotos -->
	<link rel='stylesheet' id='camera-css' href='imagenes/Slider/Camera-master/css/camera.css' type='text/css' media='all'> 



	<!-- ------------------------------------------------- -->
    <!-- /////         Javascript/JQuery             ///// -->
    <!-- ------------------------------------------------- -->

<!-- Inclusión de funciones JQuery y JQuery UI-->
<!-- JQuery UI incluye la función 'datepicker', neceaaria para crear el calendario -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


<!-- Inclusión de archivo de funciones Ajax -->
<script language="JavaScript" type="text/javascript" src="js/functions.js"></script>

<!-- Inclusión de archivos JSON-Javascript -->
<script language="JavaScript" type="text/javascript" src="json\cycle.js"></script>
<script language="JavaScript" type="text/javascript" src="json\json_parse.js"></script>
<script language="JavaScript" type="text/javascript" src="json\json_parse_state.js"></script>
<script language="JavaScript" type="text/javascript" src="json\json2.js"></script>


<script language="JavaScript" type="text/javascript">

	/* BOTON MENU */
	$(document).ready(function(){

		/* Pasa el Header a Activo al presionarse el botón 'Menu' */
		$("button").click(function(){
			$("header").toggleClass('active');
		});

		/* Enlentece los llamados a referencias 'href' */
		$(".boton_menu_scroll").click(function(){
			$("html, body").animate({
	    	    scrollTop: $( $(this).attr('href') ).offset().top
			}, 500);
		    return false;
		});
	});


	/* ENVIO DE CONSULTA */
	function enviar_consulta(){
		// Seteo de datos para enviar
		var tipo_mensaje	= document.getElementById('tipo_mensaje').value;
		var nombre			= document.getElementById('nombre').value;
		var email			= document.getElementById('email').value;
		var tel				= document.getElementById('tel').value;
		var mensaje			= document.getElementById('mensaje').value;

		var datos			= "tipo_mensaje="+tipo_mensaje+"&nombre="+nombre+"&email="+email+"&tel="+tel+"&mensaje="+mensaje;


		// Creación del contexto de Ajax
		ajax = objetoAjax();
		ajax.open("POST", "enviar_consulta.php", true);
		ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		ajax.setRequestHeader("Content-length", datos.length);
		ajax.setRequestHeader("Connection", "close");


		ajax.onreadystatechange=function(){
		
			if(ajax.readyState==4){
				// UTILIZAR JSON
				result = ajax.responseText;

				var obj_json = JSON.parse(result);

				// Se captura el estado por si en algun momento se decide confirmar el correcto envío del mail
				var estado = obj_json[0].estado;
			}
		}


        // Envio el formulario de consulta
		ajax.send(datos);


		/* Show del Modal */
		var modal = document.getElementById('modal_consulta_enviada');
		modal.style.display = "block";

		/* Limpiar campos del formulario */
		document.getElementById("contacto").reset();


		window.location.assign("#Portada");

		}


	/* Cerrar Popup de Consulta Enviada */
	function cerrar_modal_consulta(){
		var modal = document.getElementById('modal_consulta_enviada');
		modal.style.display = "none";
	}
	/* Cerrar Popup de Consulta Enviada al presionar fuera de la ventana de Popup */
	window.onclick = function(event) {
		var modal = document.getElementById('modal_consulta_enviada');
    	if (event.target == modal) {
        	modal.style.display = "none";
	    	}
	}


	/* Popup de Descripción de cada Integrante */
	function mostrar_descripcion_integrante(p_integrante){
		/* Show del Modal */
		switch(p_integrante){
			case 'Blanco':
				var modal = document.getElementById('modal_descripcion_integrante_Blanco');
				break;
			case 'Mariana':
				var modal = document.getElementById('modal_descripcion_integrante_Mariana');
				break;
			case 'Seba':
				var modal = document.getElementById('modal_descripcion_integrante_Seba');
				break;
			case 'Lucio':
				var modal = document.getElementById('modal_descripcion_integrante_Lucio');
				break;
			case 'Lea':
				var modal = document.getElementById('modal_descripcion_integrante_Lea');
				break;
			case 'Martin':
				var modal = document.getElementById('modal_descripcion_integrante_Martin');
				break;
			case 'Hugo':
				var modal = document.getElementById('modal_descripcion_integrante_Hugo');
				break;
		}
				
		modal.style.display = "block";
	}

	/* Cerrar Popup de Descripción de Integrante*/
	function cerrar_modal_consulta(){
		var modal = document.getElementById('modal_descripcion_integrante_Blanco');
		modal.style.display = "none";
		var modal = document.getElementById('modal_descripcion_integrante_Mariana');
		modal.style.display = "none";
		var modal = document.getElementById('modal_descripcion_integrante_Seba');
		modal.style.display = "none";
		var modal = document.getElementById('modal_descripcion_integrante_Lucio');
		modal.style.display = "none";
		var modal = document.getElementById('modal_descripcion_integrante_Lea');
		modal.style.display = "none";
		var modal = document.getElementById('modal_descripcion_integrante_Martin');
		modal.style.display = "none";
		var modal = document.getElementById('modal_descripcion_integrante_Hugo');
		modal.style.display = "none";
	}

	/* Cerrar Popup de Descripción de Integrante al presionar fuera de la ventana de Popup */
	window.onclick = function(event) {
		var modal = document.getElementById('modal_descripcion_integrante_Blanco');
    	if (event.target == modal) { modal.style.display = "none"; }
		var modal = document.getElementById('modal_descripcion_integrante_Mariana');
    	if (event.target == modal) { modal.style.display = "none"; }
		var modal = document.getElementById('modal_descripcion_integrante_Seba');
    	if (event.target == modal) { modal.style.display = "none"; }
		var modal = document.getElementById('modal_descripcion_integrante_Lucio');
    	if (event.target == modal) { modal.style.display = "none"; }
		var modal = document.getElementById('modal_descripcion_integrante_Lea');
    	if (event.target == modal) { modal.style.display = "none"; }
		var modal = document.getElementById('modal_descripcion_integrante_Martin');
    	if (event.target == modal) { modal.style.display = "none"; }
		var modal = document.getElementById('modal_descripcion_integrante_Hugo');
    	if (event.target == modal) { modal.style.display = "none"; }
	}

</script>


	<!-- Inclusión de JQuery del Slider de Fotos -->
    <script type='text/javascript' src="./imagenes/Slider/Camera-master/scripts/jquery.min.js"></script>
    <script type='text/javascript' src='./imagenes/Slider/Camera-master/scripts/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='./imagenes/Slider/Camera-master/scripts/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='./imagenes/Slider/Camera-master/scripts/camera.min.js'></script> 
    
    <script>
		jQuery(function(){

			jQuery('#camera_wrap_1').camera({
				autoAdvance: true,
				height: '400px',
				loader: 'pie',		/* or 'pie' */
				loaderColor: 'yellow' ,
				pagination: false,
				thumbnails: true,
				time: 7000,
				transPeriod: 3000,
				pauseOnClick: false
/*				loaderOpacity: .6,*/
			});

			
			jQuery('#camera_wrap_2').camera({
				autoAdvance: true,
				pagination: true,
				thumbnails: false,
				navigation: true
/*				height: '400px',*/
			});

		});
	</script>

  
</head>

<body>
<header>
	<button class="boton_menu">
    	<span>MENU</span>
	</button>
   	<nav><ul class="nav_menu">
    	<li class="boton_menu_izq"><a class="boton_menu_scroll" href="#Portada">Inicio</a></li>
    	<li class="boton_menu_izq"><a class="boton_menu_scroll" href="#Nosotros">Nosotros</a></li>
       	<li class="boton_menu_izq"><a class="boton_menu_scroll" href="#Agenda">Agenda</a></li>
       	<li class="boton_menu_izq"><a class="boton_menu_scroll" href="#Galeria">Galeria</a></li>
       	<li class="boton_menu_izq"><a class="boton_menu_scroll" href="#Contacto">Contacto</a></li>
<!--    <li><a>Login</a></li> -->
       	<li class="boton_menu_der"><a href="https://www.youtube.com/channel/UCAX5m6FC_pJ_V5ji9wgQTAw" target="_blank"><img height="100%" src="imagenes/Logos_Social_Media/logo_youtube.png" /></a></li>
       	<li class="boton_menu_der"><a href="https://www.instagram.com/theimpros/" target="_blank"><img height="100%" src="imagenes/Logos_Social_Media/logo_instagram.png" /></a></li>
       	<li class="boton_menu_der"><a href="https://www.facebook.com/theimpros/" target="_blank"><img height="100%" src="imagenes/Logos_Social_Media/logo_facebook.png" /></a></li>
    </ul></nav>
</header>

<div class="container">

	<div class="portada" id="Portada">
        <!--Imagen Cabecera-->
        <img src="imagenes/the_impros_saludo_final.jpg" alt="Portada The Impros" name="Insert_logo" id="Insert_logo" style="background-color: black;" />
        <!-- h1 oculto -->
      <h1 style="visibility: hidden;">The Impros, Show de humor improvisado</h1>
	</div>
	<article>
	    <h2 id="Nosotros">Nosotros</h2>
    	<section>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ac felis vulputate, posuere arcu in, dictum augue. Curabitur tempus, est et consequat fermentum, erat est pretium lorem, id fringilla mi tellus quis sapien. Aliquam erat volutpat. Etiam vestibulum ut massa eu ultrices. Morbi congue, mi ut convallis venenatis, eros nunc tempus magna, non laoreet risus turpis vitae quam. Aliquam porttitor enim in lectus interdum, quis bibendum dolor dignissim. Quisque at urna sit amet tortor rhoncus convallis. Sed vehicula semper varius. Etiam cursus lectus a lacus ultrices, eget efficitur nisi pulvinar. Phasellus quis mattis neque, sit amet sodales arcu. Pellentesque id ex quis dui pellentesque porttitor et non est. Integer vulputate diam eget purus cursus ornare. Maecenas convallis elementum sem. Mauris non molestie ex. Phasellus efficitur metus a lectus viverra, vel imperdiet elit porttitor.</p>
        <p>
Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc dictum bibendum nunc ac iaculis. Aenean ornare nibh eget viverra congue. Duis nec nisl vel nibh congue laoreet vitae eu libero. Ut efficitur malesuada metus, eu sodales magna vestibulum at. Sed dapibus mollis lorem quis aliquet. Cras scelerisque velit in dui sollicitudin, ac mattis urna bibendum. Vestibulum malesuada nisi sit amet enim sagittis, quis dignissim quam condimentum.</p>
	    </section>
        <section class="sec_fotos_personales" id="sec_fotos_personales">
			<div class="foto_personal" id="foto_personal" onClick="javascript:mostrar_descripcion_integrante('Blanco');">
            	<img src="imagenes/Fotos Personales/Foto Blanco.jpg" alt="Leandro Blanco" title="Leandro Blanco" />
                <div class="nombre_foto_personal foto_personal_blanco" id="nombre_foto_personal">Leandro Blanco
                </div>
			</div>
        	<div class="foto_personal" id="foto_personal" onClick="javascript:mostrar_descripcion_integrante('Mariana');">
            	<img src="imagenes/Fotos Personales/Foto Mariana.jpg" alt="Mariana Oller" title="Mariana Oller" />
				<div class="nombre_foto_personal foto_personal_mariana" id="nombre_foto_personal">Mariana Oller
                </div>
            </div>
			<div class="foto_personal" id="foto_personal" onClick="javascript:mostrar_descripcion_integrante('Seba');">
            	<img src="imagenes/Fotos Personales/Foto Seba.jpg" alt="Sebastian Bocchio" title="Sebastian Bocchio" />
				<div class="nombre_foto_personal foto_personal_seba" id="nombre_foto_personal">Sebastian Bocchio
                </div>
            </div>
			<div class="foto_personal" id="foto_personal" onClick="javascript:mostrar_descripcion_integrante('Lucio');">
            	<img src="imagenes/Fotos Personales/Foto Lucio.jpg" alt="Lucio Martinelli" title="Lucio Martinelli" />
				<div class="nombre_foto_personal foto_personal_lucio" id="nombre_foto_personal">Lucio Martinelli
                </div>
            </div>
        	<div class="foto_personal" id="foto_personal" onClick="javascript:mostrar_descripcion_integrante('Lea');">
            	<img src="imagenes/Fotos Personales/Foto Lea.jpg" alt="Leandro Paolillo" title="Leandro Paolillo" />
				<div class="nombre_foto_personal foto_personal_lea" id="nombre_foto_personal">Leandro Paolillo
                </div>
            </div>
			<div class="foto_personal" id="foto_personal" onClick="javascript:mostrar_descripcion_integrante('Martin');">
            	<img src="imagenes/Fotos Personales/Foto Martin.jpg" alt="Martin Provera" title="Martin Provera" />
				<div class="nombre_foto_personal foto_personal_martin" id="nombre_foto_personal">Martin Provera
                </div>
            </div>
<!--		<div class="foto_personal" id="foto_personal" onClick="javascript:mostrar_descripcion_integrante('Hugo');">
            	<img src="imagenes/Fotos Personales/Foto Hugo.jpg" alt="Hugo Cerizola" title="Hugo Cerizola" />
				<div class="nombre_foto_personal foto_personal_hugo" id="nombre_foto_personal">Hugo Cerizola
                </div>
            </div> -->


        <!-- Modal con descripción de cada integrante -->

		<div id="modal_descripcion_integrante_Blanco" class="modal">
	           	<div class="modal_titulo">
                	<span>Un poco sobre nosotros</span>
                    <span onClick="cerrar_modal_consulta();" class="close">&times;</span>
                </div>
    	    	<div class="modal_cuerpo" style="height: 400px;">
					<div class="modal_texto_personal" style="height: 100%;">
						<div class="modal_nombre_foto_personal foto_personal_blanco">Leandro Blanco</div>
						<div class="modal_descripcion_personal">Humorista, escritor, periodista, simpático. Hace casi 10 años que se dedica al humor en todas sus formas (teatro, stand up, guiones, videos, radio). Elige la improvisación por “ser la expresión que maneja uno de los recursos mas lindos de la comedia: la sorpresa”.</div>
                    </div>
					<div class="modal_foto_personal">
	                    <img src="imagenes/Fotos Personales/Foto Blanco.jpg" alt="Leandro Blanco" title="Leandro Blanco" />
                    </div>
					<div style="clear:both;"></div>
            	</div>
		</div>

		<div id="modal_descripcion_integrante_Mariana" class="modal">
	           	<div class="modal_titulo">
                	<span>Un poco sobre nosotros</span>
                    <span onClick="cerrar_modal_consulta();" class="close">&times;</span>
                </div>
    	    	<div class="modal_cuerpo" style="height: 400px;">
					<div class="modal_texto_personal" style="height: 100%;">
						<div class="modal_nombre_foto_personal foto_personal_mariana">Mariana Oller</div>
						<div class="modal_descripcion_personal">Actriz. Respira teatro desde los 14 años. Estudió con distintos profesores y está a punto de terminar la carrera de actuación. Participó en mas de 20 obras y se especializa más en la improvisación.</div>
                    </div>
					<div class="modal_foto_personal">
	                    <img src="imagenes/Fotos Personales/Foto Mariana.jpg" alt="Mariana Oller" title="Mariana Oller" />
                    </div>
					<div style="clear:both;"></div>
            	</div>
		</div>

		<div id="modal_descripcion_integrante_Seba" class="modal">
	           	<div class="modal_titulo">
                	<span>Un poco sobre nosotros</span>
                    <span onClick="cerrar_modal_consulta();" class="close">&times;</span>
                </div>
    	    	<div class="modal_cuerpo" style="height: 400px;">
					<div class="modal_texto_personal" style="height: 100%;">
						<div class="modal_nombre_foto_personal foto_personal_seba">Sebastián Bocchio</div>
						<div class="modal_descripcion_personal">Licenciado en Sistemas y en cursos de temáticas variadas. Fanático de la musica (pasa del Reggae al Metal en un chasquido de dedos) y de la buena comedia. Transitó distintas formas del arte, como el canto, el baile y la ejecución de instrumentos musicales. Ferviente degustador de bebidas balkánicas, nos comparte que la improvisación ha sido para él “un ingreso mas de plata”.</div>
                    </div>
					<div class="modal_foto_personal">
	                    <img src="imagenes/Fotos Personales/Foto Seba.jpg" alt="Sebastián Bocchio" title="Sebastián Bocchio" />
                    </div>
					<div style="clear:both;"></div>
            	</div>
		</div>

		<div id="modal_descripcion_integrante_Lucio" class="modal">
	           	<div class="modal_titulo">
                	<span>Un poco sobre nosotros</span>
                    <span onClick="cerrar_modal_consulta();" class="close">&times;</span>
                </div>
    	    	<div class="modal_cuerpo" style="height: 400px;">
					<div class="modal_texto_personal" style="height: 100%;">
						<div class="modal_nombre_foto_personal foto_personal_lucio">Lucio Martinelli</div>
						<div class="modal_descripcion_personal">Licenciado en publicidad. Artista desde siempre, aplica la creatividad en todo momento. Ha estado en obras de teatro, actos de magia y concursos de baile. “Hago improvisación porque me hace sentir mas autentico”.</div>
                    </div>
					<div class="modal_foto_personal">
	                    <img src="imagenes/Fotos Personales/Foto Lucio.jpg" alt="Lucio Martinelli" title="Lucio Martinelli" />
                    </div>
					<div style="clear:both;"></div>
            	</div>
		</div>

		<div id="modal_descripcion_integrante_Lea" class="modal">
	           	<div class="modal_titulo">
                	<span>Un poco sobre nosotros</span>
                    <span onClick="cerrar_modal_consulta();" class="close">&times;</span>
                </div>
    	    	<div class="modal_cuerpo" style="height: 400px;">
					<div class="modal_texto_personal" style="height: 100%;">
						<div class="modal_nombre_foto_personal foto_personal_lea">Leandro Paolillo</div>
						<div class="modal_descripcion_personal">Licenciado en Comercio Internacional y Maestro de Origami. Extrovertido, siempre creó personajes en todos los lugares donde estuvo para hacer reir a la gente. La improvisación le dio mas herramientas para crear historias, divertir a la gente y “ser quien yo quiera ser por un momento”.</div>
                    </div>
					<div class="modal_foto_personal">
	                    <img src="imagenes/Fotos Personales/Foto Lea.jpg" alt="Leandro Paolillo" title="Leandro Paolillo" />
                    </div>
					<div style="clear:both;"></div>
            	</div>
		</div>

		<div id="modal_descripcion_integrante_Martin" class="modal">
	           	<div class="modal_titulo">
                	<span>Un poco sobre nosotros</span>
                    <span onClick="cerrar_modal_consulta();" class="close">&times;</span>
                </div>
    	    	<div class="modal_cuerpo" style="height: 400px;">
					<div class="modal_texto_personal" style="height: 100%;">
						<div class="modal_nombre_foto_personal foto_personal_martin">Martin Provera</div>
						<div class="modal_descripcion_personal">Hotelero, analista en Recursos Humanos y profesor de Ingles. Asiduo espectador de teatro, tiene un amplio conocimiento en la materia, centrandose en los últimos años en la comedia y la Improvisacion, tanto como público como actor. “Para estructuras está el trabajo. Me gusta jugar en escena, crear en el momento, ser parte de un grupo... me gusta la Impro”.</div>
                    </div>
					<div class="modal_foto_personal">
	                    <img src="imagenes/Fotos Personales/Foto Martin.jpg" alt="Martin Provera" title="Martin Provera" />
                    </div>
					<div style="clear:both;"></div>
            	</div>
		</div>

		<div id="modal_descripcion_integrante_Hugo" class="modal">
	           	<div class="modal_titulo">
                	<span>Un poco sobre nosotros</span>
                    <span onClick="cerrar_modal_consulta();" class="close">&times;</span>
                </div>
    	    	<div class="modal_cuerpo" style="height: 400px;">
					<div class="modal_texto_personal" style="height: 100%;">
						<div class="modal_nombre_foto_personal foto_personal_hugo">Hugo Cerizola</div>
						<div class="modal_descripcion_personal">Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</div>
                    </div>
					<div class="modal_foto_personal">
	                    <img src="imagenes/Fotos Personales/Foto Hugo.jpg" alt="Hugo Cerizola" title="Hugo Cerizola" />
                    </div>
					<div style="clear:both;"></div>
            	</div>
		</div>


        </section>
    </article>
	<article>
      <h2 id="Agenda">Agenda</h2>
		<section>
        <p>Mira nuestra agenda de programación con los próximos shows, y clickeá en cada uno para tener mas detalles. Para reservar tus entradas, envianos tus datos en el formulario de contacto (al final de la web) diciendo cuantas entradas y a qué show querés ir.</p>

<!-- Script JQuery para crear el calendario en la web. Utiliza las librerías JQuery y JQuery UI incluidas en el <head>
Se comenta, ya que es DatePicker. Pero se deja en el código por si se define reactivarlo -->
<!--	<div id="calendario"></div>-->

<div id="div_calendario">
<iframe style="	border: rgb(153,153,153) solid 0px; border-radius: 5px; " src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=400&amp;wkst=2&amp;hl=es_419&amp;bgcolor=%23ffffff&amp;src=u7guui7e5mdsus5mmdophd6gug%40group.calendar.google.com&amp;color=%23711616&amp;ctz=America%2FArgentina%2FBuenos_Aires" style="border:solid 1px #777" width="950" height="400" frameborder="0" scrolling="no"></iframe><p></p>
		</div>
	    </section>
	</article>
	<article>
      <h2 id="Galeria">Galeria</h2>
		<section>
        <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>





<!-- DIV DE SLIDER DE FOTOS Y VIDEOS
	 Fuentes:	http://www.pixedelic.com
			    http://www.ajaxshake.com/demo/ES/1075/576c7ff2/plugin-jquery-para-mostrar-diapositivas-y-pasarlas-automaticamente-camera.html	-->

	<h3>NUESTRAS FOTOS</h3>

	<div class="fluid_container">

        <div class="camera_wrap camera_azure_skin" id="camera_wrap_1">
            <div data-thumb="./imagenes/Slider/Camera-master/images/slides/thumbs/bridge.jpg" data-src="./imagenes/Slider/Camera-master/images/slides/bridge.jpg">
                <div class="camera_caption fadeFromBottom">
                    Camera is a responsive/adaptive slideshow. <em>Try to resize the browser window</em>
                </div>
            </div>
            <div data-thumb="./imagenes/Slider/Camera-master/images/slides/thumbs/leaf.jpg" data-src="./imagenes/Slider/Camera-master/images/slides/leaf.jpg">
                <div class="camera_caption fadeFromBottom">
                    It uses a light version of jQuery mobile, <em>navigate the slides by swiping with your fingers</em>
                </div>
            </div>
            <div data-thumb="./imagenes/Slider/Camera-master/images/slides/thumbs/road.jpg" data-src="./imagenes/Slider/Camera-master/images/slides/road.jpg">
                <div class="camera_caption fadeFromBottom">
                    <em>It's completely free</em> (even if a donation is appreciated)
                </div>
            </div>
            <div data-thumb="./imagenes/Slider/Camera-master/images/slides/thumbs/sea.jpg" data-src="./imagenes/Slider/Camera-master/images/slides/sea.jpg">
                <div class="camera_caption fadeFromBottom">
                    Camera slideshow provides many options <em>to customize your project</em> as more as possible
                </div>
            </div>
            <div data-thumb="./imagenes/Slider/Camera-master/images/slides/thumbs/shelter.jpg" data-src="./imagenes/Slider/Camera-master/images/slides/shelter.jpg">
                <div class="camera_caption fadeFromBottom">
                    It supports captions, HTML elements and videos and <em>it's validated in HTML5</em> (<a href="http://validator.w3.org/check?uri=http%3A%2F%2Fwww.pixedelic.com%2Fplugins%2Fcamera%2F&amp;charset=%28detect+automatically%29&amp;doctype=Inline&amp;group=0&amp;user-agent=W3C_Validator%2F1.2" target="_blank">have a look</a>)
                </div>
            </div>
            <div data-thumb="./imagenes/Slider/Camera-master/images/slides/thumbs/tree.jpg" data-src="./imagenes/Slider/Camera-master/images/slides/tree.jpg">
                <div class="camera_caption fadeFromBottom">
                    Different color skins and layouts available, <em>fullscreen ready too</em>
                </div>
            </div>
        </div><!-- #camera_wrap_1 -->

    </div><!-- .fluid_container -->
<!-- FIN DIV DE SLIDER DE FOTOS -->


	<h3>NUESTROS VIDEOS</h3>

<!-- <a href="https://developers.google.com/youtube/iframe_api_reference#Getting_Started">https://developers.google.com/youtube/iframe_api_reference#Getting_Started</a> -->

	<div class="fluid_container">

	<!-- DIV donde se posicionará el reproductor -->
    <div id="player">
    
        <script>
          // 2. This code loads the IFrame Player API code asynchronously.
          var tag = document.createElement('script');
    
          tag.src = "https://www.youtube.com/iframe_api";
          var firstScriptTag = document.getElementsByTagName('script')[0];
          firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    
          // 3. This function creates an <iframe> (and YouTube player)
          //    after the API code downloads.
          var player;
          function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
              height: '493',	/*360*/
              width: '900', 	/*640*/
/*			  videoId: 'PLjm1gO6y0o',*/
			  playerVars: {
			/*	'listType': 'playlist',
				'list': 'PLt87kvObzjKRg3f2Y9J-J-f9cJXB89XVY', 	Conf Playlist se comenta y envía a función */
				'color': 'white',
				'controls': 1,		/* con 0 oculta los controles */
				'disablekb': 1,		/* inhabilita controles de teclado */
				'rel': 0			/* Sin videos sugeridos al finalizar */
			  },
              events: {
	            'onReady': onPlayerReady,
/*              'onStateChange': onPlayerStateChange*/
              }
            });
          }
    
          // 4. The API will call this function when the video player is ready.
          function onPlayerReady(event) {
			player.cuePlaylist({'list': 'PLt87kvObzjKRg3f2Y9J-J-f9cJXB89XVY',
								 'listType': 'playlist'});
			player.setVolume(90);
          }
    
          // 5. The API calls this function when the player's state changes.
          //    The function indicates that when playing a video (state=1),
          //    the player should play for six seconds and then stop.
          var done = false;
          function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.PLAYING && !done) {
              setTimeout(stopVideo, 6000);
              done = true;
            }
          }

          function stopVideo() {
            player.stopVideo();
          }

        </script>
	</div>
	</div>

	<h3></h3>

    </section>
	</article>
	<article>
      <h2 id="Contacto">Contactános</h2>
		<section>
        <p>Envianos tu consulta, reserva o sugerencia. Respuesta asegurada!</p>
			<form name="contacto" id="contacto" action="javascript:enviar_consulta();" method="POST">
			<table id="tabla_contacto">
            	<tr>
                    <th width="97"><label>Qué buscas?</label></th><td></td>
                    <td><select name="tipo_mensaje" id="tipo_mensaje" size="1" required>
                    		<option value="reserva" selected>Quiero reservar entradas</option>
                    		<option value="consulta">Quiero hacer una consulta</option>
                    		<option value="sugerencia">Quiero dejar una sugerencia</option>
                        </select></td><td>*</td>
                </tr>
            	<tr>
                    <th width="97"><label for="nombre">Nombre</label></th><td>:</td>
                    <td><input type="text" size="40" maxlength="80" id="nombre" name="nombre" required placeholder="Requerido" /></td><td>*</td>
                </tr>
            	<tr>
                    <th><label for="email">Email</label></th><td>:</td>
                    <td><input type="email" size="40" id="email" name="email" required placeholder="Requerido" /></td><td>*</td>
                </tr>
                <tr>
                    <th><label for="tel">Teléfono</label></th><td>:</td>
                    <td><input type="number" id="tel" name="tel" required placeholder="Requerido" /></td>
                </tr>
            	<tr>
                    <th valign="top"><label for="mensaje">Mensaje</label></th><td valign="top">:</td>
                    <td><textarea cols="40" rows="10" id="mensaje" name="mensaje" required placeholder="Requerido"></textarea></td><td valign="top">*</td>
                </tr>
                <tr>
                    <th></th><td></td><td align="left"><input type="submit" value="Enviar Consulta" name="enviar_consulta" id="enviar_consulta" /></td>
                </tr>
            </table>
        </form>


        <!-- Mensaje de éxito del envío del formulario -->
		<div id="modal_consulta_enviada" class="modal">
        	<div>
	           	<div class="modal_titulo">
                	<span>Mensaje enviado</span>
                    <span onClick="cerrar_modal_consulta();" class="close">&times;</span>
                </div>
    	    	<div class="modal_cuerpo">
 					<p>Muchas gracias por tu mensaje. Te responderemos lo antes posible.<br />El equipo de 'The Impros'.</p>
            	</div>
            </div>
		</div>

	    </section>
	</article>
<!-- MENU RECOMENDADOS ASIDE
	<aside>
	    <h4>Recomendados</h4>
    	<p>Lista de recomendados</p>
	</aside>
-->
  <!-- end .container -->
  </div>
<footer>
	<div class="footer_content">
	    <p>THE IMPROS, Show de humor improvisado - Todos los derechos reservados &copy; 2017</p>
        <p>Buenos Aires, Argentina</p>
    </div>
</footer>


<!-- Script JQuery para crear el calendario en la web. Utiliza las librerías JQuery y JQuery UI incluidas en el <head>
Se comenta, ya que es DatePicker. Pero se deja en el código por si se define reactivarlo -->
<script>
/*	$('#calendario').datepicker({
		inline: true,
		firstDay: 1,
		showOtherMonths: true,
		numberOfMonths: 2,
		selectOtherMonths: true,
		dayNamesMin: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
		monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
		monthNamesShort: [ "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic" ],
	});*/
</script>



</body>
</html>
