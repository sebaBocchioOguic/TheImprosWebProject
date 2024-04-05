// JavaScript Document

$(document).ready(function(){

	  var header = $('header'),
			      btn    = $('button.boton_menu');
alert('hola');
	  btn.on('click', function(){
		    header.toggleClass('active');
	  });

});
