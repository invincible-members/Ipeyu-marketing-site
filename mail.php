<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // PHPMailer autoload

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];    // Dynamic user name
    $email = $_POST['email'];  // Dynamic user email
    $number= $_POST['number']; 
    $subject = 'Inquiry Regarding Labour Compliance Services';

    $mail = new PHPMailer(true); // Instantiating PHPMailer

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'krishneduunnikrishnan@gmail.com';  // Your Gmail address
        $mail->Password = 'wdlk wlml tfvk istd';  // App password (use Gmail app password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // TLS

        // Recipients
        $mail->setFrom('krishneduunnikrishnan@gmail.com', $name); // Dynamic name, fixed email
        $mail->addReplyTo($email, $name); // User's email and name in the "Reply-To"
        $mail->addAddress('krishneduunnikrishnan@gmail.com'); // Your email to receive the message

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = "<h3>New Contact Message from $name</h3>
                          <p>Email: $email</p>
                          <p>Dear Scem Corporate Services Team,</p>
                          <p>I hope this message finds you well.</p>
                          <p>I am reaching out to inquire about the labour compliance services your company provides. As we are in need of a reliable partner to assist us in navigating and adhering to compliance regulations, we would love to understand how Scem Corporate Services can support our business in these aspects.</p>
                          <p>Could you kindly provide more information about your offerings, including any specific solutions tailored to our industry and how we can initiate a partnership with your team?</p>
                          <p>Looking forward to your response.</p>
                          <p>Thank you for your time and assistance.</p>
                          <p>Best regards,</p>
                          <p>$name</p>
                          <p>$email</p>
                          <p>$number</p>"
                         ;
        

        // Send the email
        $mail->send();
        echo 'Message has been sent successfully';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
