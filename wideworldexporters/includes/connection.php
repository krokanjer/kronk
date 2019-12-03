<?php

class connection
{
    public function connect()
    {
        $connect = new PDO('mysql:host=185.182.56.138; dbname=dylanmg259_wwi', 'dylanmg259_scoopie', 'YLOykh2NO');
        return $connect;
    }

    public function secure_adminpanel()
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        if ($uri[2] != 'views') {
            header('Location: ../../views/adminpanel/404.php');
        }
        if ($_SESSION['employee'] === 0) {
            header('Location: ../../index.php');
        }
        return true;
    }

    public function previous_products($productid)
    {
        if (isset($_SESSION['previousproducts'])) {
            if (count($_SESSION['previousproducts']) == 6) {
                array_shift($_SESSION['previousproducts']);
            }
        }
        $_SESSION['previousproducts'][$productid] = $productid;
        return true;
    }
}
