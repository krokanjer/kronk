<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/wideworldexporters/includes/connection.php');
$connect = new connection();
$connect->secure_adminpanel();

$query_stock = $connect->connect()->prepare('SELECT * FROM StockItems');
$query_stock->execute();
$stock_amount = $query_stock->rowCount();

$query_users = $connect->connect()->prepare('SELECT * FROM people');
$query_users->execute();
$user_amount = $query_users->rowCount();