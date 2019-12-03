<?php
include('../../includes/connection.php');
$connect = new connection();
//$connect->secure_adminpanel();

$select_photo = $connect->connect()->prepare('SELECT * FROM stockphotos WHERE StockPhotoID = :stockphoto LIMIT 1');
$executed_select = $select_photo->execute(array(
    ':stockphoto' => $_GET['stockphoto']
));
$photo = $select_photo->fetchAll();

//$delete_photo = $connect->connect()->prepare('DELETE FROM stockphotos WHERE StockPhotoID = :stockphotoid');
//$executed_delete = $delete_photo->execute(array(
//    ':stockphoto' => $_GET['stockphotoid']
//));


echo json_encode(array(
    'success' => true,
    'photo' => $photo[0]['Photo']
));