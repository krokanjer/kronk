<?php
include($_SERVER['DOCUMENT_ROOT'] . '/wideworldexporters/includes/connection.php');
$connect = new connection();

$select_query = $connect->connect()->prepare('SELECT si.StockItemID, si.StockItemName, su.SupplierName, si.UnitPrice, sih.QuantityOnHand, si.TypicalWeightPerUnit FROM stockitems si
                                                       JOIN stockitemholdings sih ON si.StockItemID = sih.StockItemID
                                                       JOIN suppliers su ON si.SupplierID = su.SupplierID');
$select_query->execute();
$products = $select_query->fetchAll();