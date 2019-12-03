<?php
session_start();
if(isset($_GET['productid'])){
    unset($_SESSION['shoppingcart'][$_GET['productid']]);
    header('Location: ../views/shopping-basket.php');
}