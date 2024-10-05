<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Incluye PHPMailer

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
    $to = "armendariz.german@gmail.com";

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

    // Configurar PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Mostrar detalles de depuración
        $mail->SMTPDebug = 3; // Cambiar a 3 para detalles avanzados

        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'mail.german-webmaster.com'; // Cambiar a tu servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'armendarizgerman@german-webmaster.com';
        $mail->Password = 'AiNZKN9TWgNL';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Usar SMTPS para SSL
        $mail->Port = 465; // Usar 465 para SSL o 587 para TLS

        // Remitente y destinatario
        $mail->setFrom('armendarizgerman@german-webmaster.com', 'Germán');
        $mail->addAddress($to);

        // Asunto y cuerpo del mensaje
        $mail->Subject = $subject;
        $mail->Body = $body;

        // Permitir responder al remitente original
        $mail->addReplyTo($email);

        // Opciones SSL si se requiere
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        // Enviar el correo
        if ($mail->send()) {
            echo "<!DOCTYPE html>
            <html lang='es'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Mensaje Enviado</title>
                <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
                <link rel='stylesheet' href='styles/styles.css'>
            </head>
            <body>
                <div class='container mt-5'>
                    <div class='alert alert-success'>
                        <h4 class='alert-heading'>Gracias, $nombres</h4>
                        <p>Tu mensaje ha sido enviado con éxito. Nos pondremos en contacto contigo a la brevedad posible.</p>
                        <hr>
                        <p class='mb-0'><a href='../index.php' class='btn btn-primary'>Volver al formulario</a></p>
                    </div>
                </div>
                <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>
            </body>
            </html>";
        } else {
            echo "Error al enviar el correo.";
        }
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }
}


