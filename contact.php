<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $mail = new PHPMailer(true);

    try {
        // 🔥 SMTP CONFIG
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'abhishekchandane03@gmail.com'; // your gmail
        $mail->Password   = 'nooq shvd zmqh cccr';   // app password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // FROM / TO
        $mail->setFrom('yourgmail@gmail.com', 'Website Enquiry');
        $mail->addAddress('yourgmail@gmail.com');

        // DATA
        $name = $_POST['name'];
        $email = $_POST['email'];
        $budget = $_POST['budget'];
        $project = $_POST['project'];
        $message = $_POST['message'];
        $plan = $_POST['selected_plan'];

        // CONTENT
        $mail->isHTML(true);
        $mail->Subject = 'New Enquiry Received';

        $mail->Body = "
        <h3>New Client Enquiry</h3>
        <p><b>Name:</b> $name</p>
        <p><b>Email:</b> $email</p>
        <p><b>Plan:</b> $plan</p>
        <p><b>Project:</b> $project</p>
        <p><b>Budget:</b> $budget</p>
        <p><b>Message:</b><br>$message</p>
        ";

        $mail->send();
        echo "✅ Message sent successfully!";

    } catch (Exception $e) {
        echo "❌ Mail Error: " . $mail->ErrorInfo;
    }
}
?>