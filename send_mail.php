<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST['message']);
    
    // Validar campos
    if (!$name || !$email || !$message) {
        echo "Por favor, completa todos los campos.";
        exit;
    }

    // Configuración del correo
    $to = "tigrecaninoasesoramiento@gmail.com";
    $subject = "Nuevo mensaje de contacto de: $name";
    $body = "Nombre: $name\nCorreo: $email\n\nMensaje:\n$message";
    $headers = "From: $email";

    // Enviar el correo
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Gracias por contactarnos. Te responderemos pronto.'); window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Hubo un problema al enviar el mensaje. Por favor, inténtalo de nuevo.'); window.location.href='index.html';</script>";
    }
} else {
    echo "Método no permitido.";
}
?>
