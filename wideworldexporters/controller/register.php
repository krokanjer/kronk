<?php
//Leg de connectie
include('../includes/connection.php');
$connect = new connection();

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../includes/contact/composer/vendor/autoload.php';

include_once('../includes/contact/phpmailer-master/class.phpmailer.php');

require_once('../includes/contact/phpmailer-master/class.smtp.php');

if (!empty($_POST['fullname']) && !empty($_POST['preferredname']) && !empty($_POST['phonenumber']) && !empty($_POST['fullname']) && !empty($_POST['email']) && !empty($_POST['password'])) {

    //Controleer of het emailadres al bestaat
    $control_query = $connect->connect()->prepare('SELECT * FROM people WHERE EmailAddress = :email');
    $exec_email = $control_query->execute(array(
        ':email' => $_POST['email']
    ));
    $control_amount = $control_query->rowCount();

    //Zorg dat PersonID vergroot wordt met 1
    $update_query = $connect->connect()->prepare('SELECT PersonID FROM people ORDER BY PersonID DESC LIMIT 1');
    $exec_person = $update_query->execute();
    $last_id = $update_query->fetchAll();

    //Zorg dat CustomerID vergroot wordt met 1
    $customer_id = $connect->connect()->prepare('SELECT CustomerID FROM customers ORDER BY CustomerID DESC LIMIT 1');
    $customer_id->execute();
    $last_customer_id = $customer_id->fetchAll();

    //Controleer of alle benodigde gegevens zijn opgehaald
    if (!$exec_email || !$exec_person || !$last_customer_id) {
        echo json_encode(array(
            'success' => false,
            'warning' => 'Error 500: Serverfout'
        ));
        die;
    } else {
        //Als er geen dubbele e-mailadressen zijn dan gaan we door
        if ($control_amount != 1) {
            $query = $connect->connect()->prepare("INSERT INTO people (PersonID, FullName, PreferredName, SearchName, IsPermittedToLogon, LogonName, IsExternalLogonProvider, HashedPassword, IsSystemUser, IsEmployee, IsSalesperson, PhoneNumber, FaxNumber, EmailAddress, LastEditedBy, ValidTo)
                                                            VALUES (:personid, :fullname, :preferredname, :searchname, :ispermittedtologon, :logonname, :isexternallogonprovider, :password, :issystemuser, :isemployee, :issalesperson, :phonenumber, :faxnumber, :emailaddress, :lasteditedby, :validto);
                                                            
                                                            INSERT INTO `customers` (`CustomerID`, `CustomerName`, `BillToCustomerID`, `CustomerCategoryID`, `BuyingGroupID`, `PrimaryContactPersonID`, `AlternateContactPersonID`, `DeliveryMethodID`, `DeliveryCityID`, `PostalCityID`, `CreditLimit`, `AccountOpenedDate`, `StandardDiscountPercentage`, `IsStatementSent`, `IsOnCreditHold`, `PaymentDays`, `PhoneNumber`, `FaxNumber`, `DeliveryRun`, `RunPosition`, `WebsiteURL`, `DeliveryAddressLine1`, `DeliveryAddressLine2`, `DeliveryPostalCode`, `DeliveryLocation`, `PostalAddressLine1`, `PostalAddressLine2`, `PostalPostalCode`, `LastEditedBy`, `ValidFrom`, `ValidTo`) 
                                                                             VALUES (:customerid,   :fullname,      :customerid,                1,                NULL,               :personid,                  NULL,                     NULL,                NULL,                NULL,              NULL,           :date,                      '0',                    '0',              '0',            '0',       :phonenumber, :faxnumber,      NULL,         NULL,           '',         NULL,                        NULL,               NULL,                NULL,        NULL,                      NULL,               NULL,            '',           :date,  '9999-01-01 00:00:00');");

            $executed = $query->execute(array(
                ':personid' => $last_id[0]['PersonID'] + 1,
                ':fullname' => $_POST['fullname'],
                ':preferredname' => $_POST['preferredname'],
                ':searchname' => $_POST['fullname'] . ' ' . $_POST['preferredname'],
                ':ispermittedtologon' => 1,
                ':logonname' => $_POST['email'],
                ':isexternallogonprovider' => 0,
                ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                ':issystemuser' => 1,
                ':isemployee' => 0,
                ':issalesperson' => 0,
                ':faxnumber' => '(206) 555-0101',
                ':phonenumber' => $_POST['phonenumber'],
                ':emailaddress' => $_POST['email'],
                ':lasteditedby' => $last_id[0]['PersonID'] + 1,
                ':validto' => '9999-01-01',
                ':customerid' => $last_customer_id[0]['CustomerID'] + 1,
                ':date' => date('Y-m-d'),
            ));

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

                $mail->addAddress($_POST['email']);

                $mail->isHTML(true);

                $mail->Subject = "Nieuwe mail van Wide World Importers";
                $mail->Body = "Je hebt zojuist een account aangemaakt bij ons.";
                $mail->AltBody = "Je hebt zojuist een account aangemaakt bij ons.";

                $mail->Send();

                echo "Mail is verstuurd! U kunt binnen 12 weken een antwoord verwachten van ons goed getrainde contactteam!";
            } catch (Exception $e) {
                echo "Bericht kon niet worden verzonden, best vervelend! Error: {$mail->ErrorInfo}";
            };


            //Form validation voor registreren
            if ($executed) {
                echo json_encode(array(
                    'success' => true,
                    'warning' => 'Account aangemaakt'
                ));
                die;
            } else {
                echo json_encode(array(
                    'success' => false,
                    'warning' => 'Oeps... Er is iets fout gegaan'
                ));
                die;
            }
        } else {
            echo json_encode(array(
                'success' => false,
                'warning' => 'Dit E-mailadres bestaat al'
            ));
            die;
        }
    }
} else {
    echo json_encode(array(
        'success' => false,
        'warning' => 'Alle velden moeten worden ingevuld'
    ));
    die;
}