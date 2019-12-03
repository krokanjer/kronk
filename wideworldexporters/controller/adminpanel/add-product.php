<?php
if (!isset($_SESSION)) {
    session_start();
};
include('../../includes/connection.php');
$connect = new connection();
$connect->secure_adminpanel();

function array_file(&$file_post)
{

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

$select_suppliers = $connect->connect()->prepare('SELECT * FROM suppliers');
$select_suppliers->execute();
$suppliers = $select_suppliers->fetchAll();

$select_colors = $connect->connect()->prepare('SELECT * FROM colors');
$select_colors->execute();
$colors = $select_colors->fetchAll();

$select_packages = $connect->connect()->prepare('SELECT * FROM packagetypes');
$select_packages->execute();
$packages = $select_packages->fetchAll();

$select_stockgroups = $connect->connect()->prepare('SELECT * FROM stockgroups');
$select_stockgroups->execute();
$stockgroups = $select_stockgroups->fetchAll();

if (isset($_POST['submit'])) {

    $get_last = $connect->connect()->prepare('SELECT StockItemID FROM stockitems ORDER BY StockItemID DESC LIMIT 1');
    $get_last->execute();
    $last_stockitem = $get_last->fetchAll();

    $get_last_stockgroupid = $connect->connect()->prepare('SELECT StockItemStockGroupID FROM stockitemstockgroups ORDER BY StockItemStockGroupID DESC LIMIT 1');
    $get_last_stockgroupid->execute();
    $last_stockgroupid = $get_last_stockgroupid->fetchAll();

    $update_product = $connect->connect()->prepare('INSERT INTO stockitems (
                                                                                   StockItemID, StockItemName, SupplierID, ColorID,
                                                                                   UnitPackageID, OuterPackageID, Brand, Size, LeadTimeDays,
                                                                                   QuantityPerOuter, IsChillerStock, Barcode, TaxRate, UnitPrice,
                                                                                   RecommendedRetailPrice, TypicalWeightPerUnit, MarketingComments)
                                                                                   VALUES(
                                                                                   :stockitemid, :stockitemname, :supplierid, :colorid, :unitpackage,
                                                                                   :outerpackage, :brand, :size, :leadtime, :quantity, :chillerstock,
                                                                                   :barcode, :taxrate, :unitprice, :retail, :weight, :description);
                                                             INSERT INTO stockitemstockgroups (
                                                                                   StockItemStockGroupID, StockItemID, StockGroupID, LastEditedBy)
                                                                                   VALUES(
                                                                                   :stockitemstockgroupid, :stockitemid, :stockgroupid, :editedby);
                                                             INSERT INTO stockitemholdings (
                                                                                   StockItemID, QuantityOnHand, LastStocktakeQuantity, LastCostPrice, LastEditedBy)
                                                                                   VALUES (
                                                                                   :stockitemid, :quantityonhand, :laststocktakequantity,:lastcostprice, :editedby);');

    $execute_product = $update_product->execute(array(
        ':stockitemid' => $last_stockitem[0]['StockItemID'] + 1,
        ':stockitemname' => $_POST['stockitemname'],
        ':supplierid' => $_POST['supplier'],
        ':colorid' => $_POST['color'],
        ':unitpackage' => $_POST['unitpackage'],
        ':outerpackage' => $_POST['outerpackage'],
        ':brand' => $_POST['brand'],
        ':size' => $_POST['size'],
        ':leadtime' => $_POST['leadtime'],
        ':quantity' => $_POST['quantity'],
        ':chillerstock' => $_POST['chillerstock'],
        ':barcode' => $_POST['barcode'],
        ':taxrate' => $_POST['taxrate'],
        ':unitprice' => $_POST['unitprice'],
        ':retail' => $_POST['retail'],
        ':weight' => $_POST['weight'],
        ':description' => $_POST['description'],
        ':stockitemstockgroupid' => $last_stockgroupid[0]['StockItemStockGroupID'] + 1,
        ':stockgroupid' => $_POST['stockgroup'],
        ':editedby' => $_SESSION['user_id'],
        ':quantityonhand' => $_POST['quantityonhand'],
        ':laststocktakequantity' => $_POST['quantityonhand'],
        ':lastcostprice' => $_POST['lastcostprice'],
    ));

    if ($execute_product) {
        $file_array = array_file($_FILES['photos']);
        foreach ($file_array as $file) {
            if ($file['type'] == 'image/jpeg' || $file['type'] == 'image/png' || $file['type'] == 'image/svg') {
                $temp = explode(".", $file['name']);
                $newfilename = uniqid() . '.' . end($temp);
                move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . "/wideworldexporters/product-pictures/" . $newfilename);

                $insert_photos = $connect->connect()->prepare('INSERT INTO stockphotos (StockItemID, Photo) VALUES (:stockitemid, :photo)');
                $insert_photos->execute(array(
                    ':stockitemid' => $last_stockitem[0]['StockItemID'] + 1,
                    ':photo' => $newfilename
                ));
            }
        }
    }
    header('Location: ../../views/adminpanel/stock-content.php');
}