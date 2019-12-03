<?php
include($_SERVER['DOCUMENT_ROOT'] . '/wideworldexporters/includes/connection.php');
$connect = new connection();

$select_query = $connect->connect()->prepare('SELECT * FROM people');
$select_query->execute();
$people = $select_query->fetchAll();