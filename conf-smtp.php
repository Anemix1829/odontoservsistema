<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset( $_SESSION['odo_usu_id'])){

$correorec=$_POST["correo"];
$contrarec=$_POST["contra"];
require 'vendor/autoload.php';


// Crear una nueva instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // Servidor SMTP de Gmail
    $mail->SMTPAuth   = true;
    $mail->Username   = '3275rd@gmail.com'; // Tu dirección de correo de Gmail
    $mail->Password   = 'dwmswqajpqedladi'; // Tu contraseña de Gmail o App Password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587; // Puerto SMTP de Gmail

    // Remitente y destinatarios
    $mail->setFrom('3275rd@gmail.com', 'RodRick');
    $mail->addAddress($correorec, 'INVITADO');

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'ODONTOSERV - ACCESO';
    $mail->Body    = '<b>"Bienvenido a ODONTOSERV".</b><br><br>Su correo es: <b>'.$correorec.'</b>.<br>Su contraseña es: <b>'.$contrarec."</b>";
    $mail->AltBody = '"Bienvenido a ODONTOSERV". Su correo es:'.$correorec.'. Su contraseña es: '.$contrarec.".";;

    // Enviar el correo
    $mail->send();
    ?>
        <div class="m-3 alert alert-light alert-dismissible fade show" role="alert" style="background-color: green; color: white;">
        <p>El mensaje de CORREO ELECTRÓNICO ha sido enviado exitosamente !.</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
} catch (Exception $e) {
    ?>
        <div class="m-3 alert alert-light alert-dismissible fade show" role="alert" style="background-color: red; color: white;">
        <p> El mensaje no pudo ser enviado. Error de Mailer: <?php echo '{$mail->ErrorInfo}'; ?></p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
}


}else{
    header("Location: ./");
}
?>