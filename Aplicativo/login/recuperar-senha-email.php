<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$cpf = $_POST["cpf"];

$sql = "SELECT cpf, pessoa_id, nome, email FROM tb_pessoa WHERE cpf = :cpf";

include_once("../classes/Conexao.php");

$resultado = $conn->prepare($sql);
$resultado->bindParam(':cpf', $cpf);
$resultado->execute();

$linha = $resultado->fetch();

if ($linha === false) {
    // CPF não encontrado ou senha incorreta
    header("Location: ./cpf-recuperar.php?erro=1");
} else {

    $codigo = rand(100000,999999);

    require '../assets/lib/vendor/autoload.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->CharSet ='UTF-8';
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = 'acccac5512828f';
        $mail->Password = 'e65019a8614c35';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 2525;

        //Recipients
        $mail->setFrom('atendimento@fatec.com', 'Atendimento');
        $mail->addAddress($linha['email'], $linha['nome']);

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Primeiro acesso EcoDeck';
        $mail->Body = "Prezado(a) " . $linha['nome'] . "<br>Segue o código para o cadastro da senha<br>" . $codigo;
        $mail->AltBody = "Prezado(a) " . $linha['nome'] . "\n\nSegue o código para o cadastro da senha\n\n" . $codigo;

        $mail->send();

        header("Location: ./codigo-recuperar-senha.php?id={$linha['pessoa_id']}&codigo={$codigo}");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}