<?php
include($_SERVER['DOCUMENT_ROOT'] . '/wideworldexporters/includes/connection.php');
$connect = new connection();
$connect->secure_adminpanel();

$select_product_query = $connect->connect()->prepare('SELECT * FROM stockitems WHERE StockItemID = :stockitemid');
$select_product_query->execute(array(
    ':stockitemid' => $_GET['stockitem']
));
$product = $select_product_query->fetchAll();

$select_suppliers = $connect->connect()->prepare('SELECT * FROM suppliers');
$select_suppliers->execute();
$suppliers = $select_suppliers->fetchAll();

$select_colors = $connect->connect()->prepare('SELECT * FROM colors');
$select_colors->execute();
$colors = $select_colors->fetchAll();

$select_packages = $connect->connect()->prepare('SELECT * FROM packagetypes');
$select_packages->execute();
$packages = $select_packages->fetchAll();

$select_photos = $connect->connect()->prepare('SELECT * FROM stockphotos WHERE StockItemID = :stockitemid');
$select_photos->execute(array(
    ':stockitemid' => $_GET['stockitem']
));
$photos = $select_photos->fetchAll();

if (isset($_POST['submit'])) {
    $update_product = $connect->connect()->prepare('UPDATE stockitems SET StockItemName = :stockitemname,
                                                                                   SupplierID = :supplierid,
                                                                                   ColorID = :colorid,
                                                                                   UnitPackageID = :unitpackage,
                                                                                   OuterPackageID = :outerpackage,
                                                                                   Brand = :brand,
                                                                                   Size = :size,
                                                                                   LeadTimeDays = :leadtime,
                                                                                   QuantityPerOuter = :quantity,
                                                                                   IsChillerStock = :chillerstock,
                                                                                   Barcode = :barcode,
                                                                                   TaxRate = :taxrate,
                                                                                   UnitPrice = :unitprice,
                                                                                   RecommendedRetailPrice = :retail,
                                                                                   TypicalWeightPerUnit = :weight,
                                                                                   MarketingComments = :description
                                                                                   WHERE StockItemID = :stockitemid');
    $execute_product = $update_product->execute(array(
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
        ':stockitemid' => $_GET['stockitem']
    ));
    header('Location: ../../views/adminpanel/stock-content.php');
}