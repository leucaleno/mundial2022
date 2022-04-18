<?php
// Check for empty fields
if(empty($_POST['name'])      ||
   empty($_POST['company'])   ||
   empty($_POST['email'])     ||
   empty($_POST['phone'])     ||
   empty($_POST['country'])     ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
{
   echo "No arguments Provided!";
   return false;
}
   
$name = strip_tags(htmlspecialchars($_POST['name']));
$company = strip_tags(htmlspecialchars($_POST['company']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$country = strip_tags(htmlspecialchars($_POST['country']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'jarevalosv@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contacto desde la web de parte de:  $name";
$email_body = "Hola Verónica, recibiste un mensaje desde la planilla de contacto.\n\n"."Estos son los detalles:\n\nNombre: $name\n\nEmpresa: $company\n\nEmail: $email_address\n\nTeléfono: $phone\n\nPaís: $country\n\nConsulta:\n$message";
$headers = "From: noreply@trabajosaludable.com.ar\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   

$result = mail($to,$email_subject,$email_body,$headers);
die($result);         
?>