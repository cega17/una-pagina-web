<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["correo"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Envía un correo electrónico
    $to = "";
    $subject = "Nuevo mensaje de contacto";
    $headers = "From: $email";
    $message_email = "Nombre: $fullname\nEmail: $email\nTeléfono: $phone\nMensaje: $message";
    mail($to, $subject, $message_email, $headers);

    // Envía un mensaje de WhatsApp (requiere la API de WhatsApp Business)
    $api_url = "https://api.twilio.com/2010-04-01/Accounts/ACCOUNT_SID/Messages.json";
    $data = array(
        "To" => "whatsapp:+1234567890", // Reemplaza con el número de teléfono de WhatsApp
        "From" => "whatsapp:+0987654321", // Reemplaza con el número de teléfono de WhatsApp asignado por Twilio
        "Body" => "Nuevo mensaje de contacto:\nNombre: $fullname\nEmail: $email\nTeléfono: $phone\nMensaje: $message"
    );
    $data = http_build_query($data);

    $options = array(
        "http" => array(
            "header" => "Authorization: Basic " . base64_encode("TWILIO_ACCOUNT_SID:TWILIO_AUTH_TOKEN"),
            "method" => "POST",
            "content" => $data
        )
    );
    $context = stream_context_create($options);
    $response = file_get_contents($api_url, false, $context);

    if ($response) {
        echo "Mensaje enviado con éxito.";
    } else {
        echo "Error al enviar el mensaje.";
    }
}
?>
