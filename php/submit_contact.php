<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombres = htmlspecialchars($_POST['nombres']);
    $apellidos = htmlspecialchars($_POST['apellidos']);
    $estado = htmlspecialchars($_POST['estado']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $company = htmlspecialchars($_POST['company']);
    $message = htmlspecialchars($_POST['message']);

    // Definir el destinatario
    $to = "armendariz.german@gmail.com"; // Cambia esto por tu dirección de correo

    // Asunto del correo
    $subject = "Nuevo mensaje de contacto de $nombres $apellidos";

    // Cuerpo del correo
    $body = "
    Nombre: $nombres $apellidos\n
    Estado: $estado\n
    Correo Electrónico: $email\n
    Teléfono: $phone\n
    Empresa: $company\n
    Mensaje:\n$message
    ";

    // Encabezados del correo
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Enviar el correo
    if (mail($to, $subject, $body)) {
        echo "<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Mensaje Enviado</title>
            <!-- Bootstrap CSS -->
            <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
            <link rel='stylesheet' href='styles/styles.css'>
       
        </head>
        <body>
            <div class='container mt-5'>
                <div class='alert alert-success'>
                    <h4 class='alert-heading'>Gracias, $nombres
                    </h4>
                    <p>Tu mensaje ha sido enviado con éxito. Nos pondremos en contacto contigo a la brevedad posible.</p>
                    <hr>
                    <p class='mb-0'><a href='../index.php' class='btn btn-primary'>Volver al formulario</a></p>
                </div>
            </div>
            <!-- Bootstrap JS and dependencies (optional) -->
            <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>
        </body>
        </html>";
    } else {
        echo "Error al enviar el correo.";
    }
}
?>
