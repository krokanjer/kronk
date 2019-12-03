<?php
session_start();
include('../includes/connection.php');

$connect = new connection();
$var = $connect->connect()->prepare('SELECT EmailAddress, FullName FROM people WHERE PersonID = :personid');
$execute_variabele = $var->execute(array(
    ':personid' => $_SESSION['user_id']
));
$email = $var->fetchall();

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../includes/contact/composer/vendor/autoload.php';

include_once('../includes/contact/phpmailer-master/class.phpmailer.php');

require_once('../includes/contact/phpmailer-master/class.smtp.php');

// Instantiation and passing `true` enables exceptions

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
            $mail->FromName = "Wide World Importers";           // Add a recipient

            $mail->smtpConnect(
                array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                )
            );


            $mail->addAddress($email[0]["EmailAddress"]);


            $mail->isHTML(true);

            $mail->Subject = "Uw WideWordImporters account is verwijderd";
            $mail->Body = "Beste " . $email[0]["FullName"] . "<br>Uw account is zoujuist verwijderd, jammer dat u weg gaat.
                           <br>Zo mist u helaas onze stuntweken die binnenkort beschikbaar zijn. 
                           <br>Wilt u hier toch bij zijn, dan zien we u graag snel weer terug.
                           <br><br> Met vriendelijke groet,
                           <br> Brandton van het WideWorldImporters team."  ;
            $mail->AltBody = "Beste " . $email[0]["FullName"] . "<br>Uw account is zoujuist verwijderd, jammer dat u weg gaat.
                           <br>Zo mist u helaas onze stuntweken die binnenkort beschikbaar zijn. 
                           <br>Wilt u hier toch bij zijn, dan zien we u graag snel weer terug.
                           <br><br> Met vriendelijke groet,
                           <br> Brandton van het WideWorldImporters team."  ;
            $mail->Send();

            echo "Mail is verstuurd! U kunt binnen 12 weken een antwoord verwachten van ons goed getrainde contactteam!";
        } catch (Exception $e) {
            echo "Bericht kon niet worden verzonden, best vervelend! Error: {$mail->ErrorInfo}";
        };



$accountdelete = $connect->connect()->prepare('DELETE FROM people WHERE PersonID = :person_id;
DELETE FROM customers WHERE PrimaryContactPersonID = :person_id');
$execute_variabele = $accountdelete->execute(array(
':person_id' => $_SESSION['user_id']
));

if ($execute_variabele) {
session_destroy();
header("Location: ../index.php");

}