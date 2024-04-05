<?php
//header("Refresh:5;./index.php"); 
$titulo="Consulta";
$tipo=$_POST['tipo_mensaje'];
$nombre=$_POST['nombre'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$mensaje=$_POST['mensaje'];



// Divide el mensaje en líneas de 70 caracteres máximo
$mensaje = wordwrap($mensaje,70);

// CONFIGURAMOS EL EMAIL -- PARA HACER ESTO HACE FALTA CONFIGURAR UN SERVICIO SMTP DEL LADO DEL SERVIDOR
$destinatario	=	"booocha@gmail.com";
$asunto			=	"Consulta desde Sitio Web";
$consulta		=	"$tipo
					Nombre: $nombre
					Email: $email
					Telefono: $tel
					Consulta: $mensaje";
//	mail($destinatario,$asunto,$consulta);
$estado			=	"Ok";


$vector_resultado[] = array ('estado' => $estado);

// UTILIZAR JSON
$json_string = json_encode($vector_resultado);
echo($json_string);

?>
