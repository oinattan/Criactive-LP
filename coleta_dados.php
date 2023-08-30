<?php
// Inclua a biblioteca PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

// Verifique se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recolha os dados do formulário
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $mensagem = $_POST['message'];

 // Configurações do PHPMailer
 $mail = new PHPMailer;
 $mail->isSMTP();
 $mail->Host       = 'smtp.gmail.com';
 $mail->SMTPAuth   = true;
 $mail->Username   = 'natan.gomes.palusa@gmail.com';
 $mail->Password   = 'gdeuxxvkqsrkgqet';
 $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
 $mail->Port       = 465;
 $mail->CharSet    = 'UTF-8';
 $mail->isHTML(true);

 // Conteúdo do email
 $emailContent = '<html>';
 $emailContent .= '<body style="font-family: Arial, sans-serif; background-color: #f5f5f5; padding: 20px; text-align: center;">';
 $emailContent .= '<div style="background-color: #ffffff; border-radius: 10px; padding: 20px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">';
 $emailContent .= '<h1 style="color: #333;">Fomulario de Leads</h1>';
 $emailContent .= '<p style="color: #555; font-size: 16px;">De: ' . $nome . ',</p>';
 $emailContent .= '<p style="color: #555; font-size: 16px;"><strong>Email:</strong> ' . $email . '</p>';
 $emailContent .= '<p style="color: #555; font-size: 16px;"><strong>Recado:</strong> ' . $mensagem . '</p>';
 $emailContent .= '<p style="color: #555; font-size: 16px;">Lembre-se de elaborar uma boa estratégia.</p>';
 $emailContent .= '</div>';
 $emailContent .= '</body>';
 $emailContent .= '</html>';

 // Configurações do email
 $mail->setFrom('nexus@palusa.com.br', 'Criactive Design');
 $mail->addAddress('nattangg27@gmail.com');
 $mail->Subject = 'Fomulario de Leads';
 $mail->Body = $emailContent;

    
    // Tente enviar o e-mail
    try {
        $mail->send();
        
        // Redirecione com parâmetro de sucesso
        header("Location: index.php?success=1");
        exit();
    } catch (Exception $e) {
        echo 'Erro ao enviar o e-mail: ' . $mail->ErrorInfo;
    }
}


?>
