<?php
include("products.php");
$function = $connect->previous_products($_GET['productid']);
$query = $connect->connect()->prepare(
    "SELECT S.StockItemID,S.StockItemName,S.RecommendedRetailPrice,S.MarketingComments,S.Size,C.ColorName,S.Brand,SP.StockPhotoID,SP.Photo,SH.QuantityOnHand
    FROM stockitems S
    LEFT JOIN colors C ON S.ColorID=C.ColorID
    LEFT JOIN stockphotos SP ON S.StockItemID=SP.StockItemID
    LEFT JOIN stockitemholdings SH ON S.StockItemID=SH.StockItemID
    WHERE S.StockItemID = :productID
    "
);
$execute = $query->execute(array(
    ":productID" => $_GET["productid"]
));
$product = $query->fetchAll();
