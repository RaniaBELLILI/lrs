<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
function send_mail($title,$body){
    try {
        // Paramètres du serveur SMTP
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Le serveur SMTP que vous utilisez
        $mail->SMTPAuth = true;
        $mail->Username = 'samimestar123@gmail.com';  // Votre adresse e-mail SMTP
        $mail->Password = 'tier bykx elyh rmec';     // Votre mot de passe SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Activer le chiffrement TLS
        $mail->Port = 587;  // Le port SMTP utilisé par Gmail

        // Destinataires
        $mail->setFrom('samimestar123@gmail.com', 'sami mestar');
        $mail->addAddress('samimestarpic@gmail.com', 'sami 2eme');  // Ajouter un destinataire

        // Contenu de l'e-mail
        $mail->isHTML(true);  // Activer HTML
        $mail->Subject = $title;
        $mail->Body    = $body;  // Corps HTML

        $mail->send();
        echo 'E-mail envoyé avec succès';
    } catch (Exception $e) {
        echo "L'envoi de l'e-mail a échoué. Erreur: {$mail->ErrorInfo}";
    }

}
?>