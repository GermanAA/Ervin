<?php
$to = "armendariz.german@gmail.com";
$subject = "Prueba de correo SMTP en XAMPP";
$body = "Este es un mensaje de prueba enviado desde XAMPP usando un servidor SMTP.";
$headers = "From: armendarizgerman@german-webmaster.com";
// Intenta enviar el correo
if(mail($to, $subject, $body, $headers)){
    echo "Correo enviado con éxito.";
} else {
    echo "Error al enviar el correo.<br>";
    $error = error_get_last(); // Obtiene el último error
    echo "Error: " . $error['message']; // Muestra el mensaje de error
}
?>