<?php
$titulo = 'KYZ - Mensaje Enviado';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once('PHPMailer\src\PHPMailer.php');
require_once('PHPMailer\src\Exception.php');
require_once('PHPMailer\src\SMTP.php');

//Crear una instancia de PHPMailer
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "luis.lopez@davinci.edu.ar";
$mail->Password = '';
$mail->SetFrom('luis.lopez@davinci.edu.ar', 'Emmanuel Lopez');
$mail->addAddress($_POST["correo"]); //Remitente
$mail->isHTML(true);
$sector = $_POST['area'];

if($sector == '2'){
	$sector = 'Soporte Técnico';
	$mail->addBCC('luis.lopez@davinci.edu.ar');
}else if ($sector == '1'){
	$sector = 'Ventas';
	$mail->addBCC('luis.lopez@davinci.edu.ar');
}else if ($sector == '0'){
	$sector = 'No definido por el usuario';
	$mail->addBCC('luis.lopez@davinci.edu.ar');
}

$mail->Subject = 'Formulario de contacto - KYZ - Technology';
$mail->Body = '<h1 align=left>Sus comentarios fueron recibidos con exito</h1> ' .
	'<h3><ul align=left>' .
	'<li>Nombre: ' . $_POST['nombre'] . '</li>' .
	'<br><li>Apellido: ' . $_POST['apellido'] . '</li>' .
	'<br><li>Mail: ' . $_POST['correo'] . '</li>' .
	'<br><li>Telefono: ' . $_POST['telefono'] . '</li>' .
	'<br><li>Area que desea contactar : ' . $sector . '</li>' .
	'</ul></h3>' .
	'<br><h2>Su mensaje fue: </h2>' .
	'<br><h4>' . $_POST['mensaje'] . '</h4>';

$msjPantalla = '';	

if (!$mail->Send()) {
	$msjPantalla = 'No se pudo enviar el mensaje';
	$titulo = 'ERROR - No se pudo enviar Mensaje';
	$alerta = 'No se pudo enviar mensaje';
	$mensaje = 'No se pudo enviar el correo electronico';
	$error = 'Error: ';
	$this->view->msjPantalla = $msjPantalla;
	//header("location:" .  constant('URL') . "contacto");
	
	//$this->view->msjPantalla = $msjPantalla;
   // $this->render();
} else {
	$msjPantalla = 'Mensaje enviado con exito';
	$alerta = 'Mensaje enviado';
	$mensaje = 'Mensaje enviado con éxito, ahora podes seguir navegando tus productos favoritos!';
	$error = ' ';
	$this->view->msjPantalla = $msjPantalla;
	//$this->view->render('contacto/index');
}

    $this->view->msjPantalla = $msjPantalla;
    $this->render();
