<?php
session_start();
if ($_POST['amount'] > 0) {
    $_SESSION['shoppingcart'][$_POST['productid']] = $_POST['amount'];

    header('Location: ../views/shopping-basket.php');
}