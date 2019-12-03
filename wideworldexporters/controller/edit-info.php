<?php
session_start();
include('../includes/connection.php');

$connect = new connection();

//Controleer of het emailadres al bestaat
$control_query = $connect->connect()->prepare('SELECT * FROM people WHERE EmailAddress = :email AND PersonID != :personid');
$control_query->execute(array(
    ':email' => $_POST['email'],
    ':personid' => $_SESSION['user_id']
));
$email_exists = $control_query->fetchAll();
$email_check = $control_query->rowCount();

if ($email_check == 0) {
    $var = $connect->connect()->prepare('UPDATE people SET FullName = :fullname,
                                                   EmailAddress = :email,
                                                   PhoneNumber = :phonenumber WHERE PersonID = :personid;
                                                   UPDATE customers SET CustomerName = :fullcustomername, 
                                                   DeliveryCityID = :deliverycity, 
                                                   PostalCityID = :postalcity,
                                                   PhoneNumber = :phonecustomernumber, 
                                                   DeliveryAddressLine1 = :deliveryaddressline, 
                                                   DeliveryPostalCode = :deliverypostalcode,
                                                   PostalAddressLine1 = :postaladdressline, 
                                                   PostalPostalCode = :postalpostalcode, 
                                                   LastEditedBy = :lasteditedby
                                                   WHERE PrimaryContactPersonID = :personid');
    $execute_variabele = $var->execute(array(
        ':fullname' => $_POST['fullname'],
        ':email' => $_POST['email'],
        ':phonenumber' => $_POST['phonenumber'],
        ':fullcustomername' => $_POST['fullname'],
        ':phonecustomernumber' => $_POST['phonenumber'],
        ':deliverycity' => $_POST['deliverycity'],
        ':postalcity' => $_POST['postalcity'],
        ':deliveryaddressline' => $_POST['deliveryaddressline'],
        ':postaladdressline' => $_POST['postaladdressline'],
        ':deliverypostalcode' => $_POST['deliverypostalcode'],
        ':postalpostalcode' => $_POST['postalpostalcode'],
        ':lasteditedby' => $_SESSION['user_id'],
        ':personid' => $_SESSION['user_id']
    ));

    header('Location: ../views/Gegevens.php');
} else {
    header('Location: ../views/Gegevens.php');
}
if ($_POST['delete']) {
    $accountdelete = $connect->connect()->prepare('DELETE FROM people WHERE PersonID = :person_id;
                                                            DELETE FROM customers WHERE PrimaryContactPersonID = :person_id');
    $execute_variabele = $accountdelete->execute(array(
        ':person_id' => $_SESSION['user_id']
    ));

    if ($execute_variabele) {
        session_destroy();
        header("Location: ../index.php");
    }
}