<?php
include('../includes/connection.php');
$connect = new connection();

if ($_POST['search']) {
    $search_query = $connect->connect()->prepare("SELECT s.StockItemID, s.StockItemName, sp.Photo FROM stockitems s
                                                           LEFT JOIN stockphotos sp ON s.StockItemID = sp.StockItemID
                                                           WHERE s.StockItemName LIKE :search OR Tags LIKE :search
                                                           LIMIT 3");

    $execute_search = $search_query->execute(array(
        ':search' => '%' . $_POST['search'] . '%'
    ));
    $StockItems = $search_query->fetchAll(PDO::FETCH_ASSOC);


//    $searchitems = array();
//    foreach ($StockItems as $stockitem) {
//        $searchitems[$stockitem['StockItemID']] = array(
//            'StockItemID' => $stockitem['StockItemID'],
//            'StockItemName' => $stockitem['StockItemName'],
//            'Photo' => $stockitem['Photo']
//        );
//    }

    echo json_encode($StockItems);

}