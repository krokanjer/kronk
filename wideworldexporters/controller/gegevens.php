<?php
include('../includes/connection.php');

$connect = new connection();
$var = $connect->connect()->prepare('SELECT p.FullName, 
                                                      p.HashedPassword, 
                                                      p.EmailAddress, 
                                                      p.PhoneNumber, 
                                                      c.DeliveryCityID, 
                                                      c.PostalCityID, 
                                                      c.DeliveryAddressLine1, 
                                                      c.DeliveryPostalCode, 
                                                      c.PostalAddressLine1, 
                                                      c.PostalPostalCode FROM people p 
                                                      LEFT JOIN customers c ON c.PrimaryContactPersonID = p.PersonID 
                                                      WHERE PersonID = :personid');
$execute_variabele = $var->execute(array(
    ':personid' => $_SESSION['user_id']
));
$winkel = $var->fetchAll();

$get_cities = $connect->connect()->prepare('SELECT DISTINCT CityID, CityName FROM cities GROUP BY CityName');
$get_cities->execute();
$cities = $get_cities->fetchAll();
?>