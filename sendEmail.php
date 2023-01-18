<?php
use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    require_once "PHPMailer/src/PHPMailer.php";
    require_once "PHPMailer/src/SMTP.php";
    require_once "PHPMailer/src/Exception.php";

    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp-mail.outlook.com";
    $mail->SMTPAuth = true;
    $mail->Username = "seahorsestech@outlook.com";
    $mail->Password = 'Generico01.';
    $mail->Port = 587;
    $mail->SMTPSecure = "STARTTLS";

    //email settings
    $mail->isHTML(true);
    $mail->setFrom("seahorsestech@outlook.com", "SeaHorsesTech Contact");
    $mail->addAddress("javierabdias.contacto@gmail.com");
    $mail->Subject = ("Contacto cliente * $name");
    $mail->Body = "
        <h2>CONTACTO DE CLIENTE</h2>
        <h3>Nombre del cliente:</h3> $name
        <h3>Correo Electrónico:</h3> $email
        <h3>Interesado en:</h3> $subject
        <h3>Comentarios: </h3> $body
        ";

    if($mail->send()){
        $status = "success";
        $response = "Email is sent!";
    }
    else
    {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}

?>
      
Footer
© 2023 