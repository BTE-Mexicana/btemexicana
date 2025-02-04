<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bte";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $asunto = $_POST['asunto'];

    $sql = "INSERT INTO correos (Nombre, Email, Telefono, Asunto) VALUES ('$nombre', '$email', '$tel', '$asunto')";

    if ($conn->query($sql) === TRUE) {
        echo '<script> alert("El mensaje se ha enviado correctamente. Gracias por contactarnos."); location.href="../html/contacto.html" </script>';

        $to = "aarobnglez302@gmail.com";
        $subject = "Nuevo mensaje del formulario de: $nombre";
        $body = "Nombre: $nombre\nEmail: $email\nMensaje: $asunto";
        $headers = "From: me@example.com\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        if (@mail($to, $subject, $body, $headers)) {
            echo '<script> alert("El mensaje se ha enviado correctamente. Gracias por contactarnos."); location.href="../html/contacto.html" </script>';
        } else {
            echo "Error al enviar el correo";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>