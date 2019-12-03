<html>
<head>
    <meta http-equiv="refresh" content="3;url=../views/contact.php" />
</head>
</html>

<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../includes/contact/composer/vendor/autoload.php';

include_once('../includes/contact/phpmailer-master/class.phpmailer.php');

require_once('../includes/contact/phpmailer-master/class.smtp.php');

// Instantiation and passing `true` enables exceptions

$name = $_POST['name'];
$bezoeker_email = $_POST['email'];
$bericht = $_POST['message'];

if(empty($name)||empty($bezoeker_email)||empty($bericht)){
    print("Naam, email en bericht zijn allemaal verplicht");
} else {
    if (filter_var($bezoeker_email, FILTER_VALIDATE_EMAIL)){
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0;                   // Enable verbose debug output
            $mail->isSMTP();                        // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com;';    // Specify main SMTP server
            $mail->SMTPAuth = true;               // Enable SMTP authentication
            $mail->Username = 'wideworldimportersemail@gmail.com';     // SMTP username
            $mail->Password = 'wideworld1234';         // SMTP password
            $mail->SMTPSecure = true;              // Enable TLS encryption, 'ssl' also accepted
            $mail->Port = 587;

            $mail->From = "wideworldimportersemail@gmail.com";           // Set sender of the mail
            $mail->FromName = "$bezoeker_email";           // Add a recipient

            $mail->smtpConnect(
                array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                )
            );

            $mail->addAddress("wideworldimportersemail@gmail.com");

            $mail->isHTML(true);

            $mail->Subject = "Nieuwe mail van $name";
            $mail->Body = "$bericht";
            $mail->AltBody = $name . " zegt: \n" . $bericht;

            $mail->Send();

            echo "Mail is verstuurd! U kunt binnen 12 weken een antwoord verwachten van ons goed getrainde contactteam!";
        } catch (Exception $e) {
            echo "Bericht kon niet worden verzonden, best vervelend! Error: {$mail->ErrorInfo}";
        }
    } else {
        print("Voer een geldige email in!");
    }

}

print("<br> U word teruggestuurd.");
