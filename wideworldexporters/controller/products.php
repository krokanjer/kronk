<!-- PDO Connection To Database -->
<?php include($_SERVER['DOCUMENT_ROOT'] . '/wideworldexporters/includes/connection.php');
$connect = new connection();

$var = $connect->connect()->prepare(
    'SELECT SG.StockGroupName
               FROM stockgroups SG;'
);
$execute_variabele = $var->execute();
$StockGroups = $var->fetchAll();

if (!empty($_GET['stockgroupname'])) {
    try {
        $query = $connect->connect()->prepare("SELECT StockItemName,StockItemID,SearchDetails,RecommendedRetailPrice,Photo 
FROM stockitems SI
WHERE SI.StockItemID IN (SELECT SISG.StockItemID
                         FROM stockitemstockgroups SISG
                         WHERE SISG.StockGroupID IN (SELECT SG.StockGroupID
                                                     FROM stockgroups SG
                                                     WHERE stockgroupName = :stockgroupname));");
        $execute_query = $query->execute(array(
            ':stockgroupname' => str_replace('%20', ' ', $_GET['stockgroupname'])
        ));
    } catch (PDOException $e) {
        die($e->getMessage());
    }

    $StockItems = $query->fetchAll();
} else {
    if (!empty($_GET['search']) && strpos($_GET['search'], '<script>') == false) {
        $search_query = $connect->connect()->prepare("SELECT * FROM stockitems WHERE StockItemName LIKE :search OR Tags LIKE :search");

        $execute_search = $search_query->execute(array(
            ':search' => '%' . $_GET['search'] . '%'
        ));
        $StockItems = $search_query->fetchAll();

    } else {
        $var = $connect->connect()->prepare(
            'SELECT StockItemName,StockItemID,SearchDetails,RecommendedRetailPrice,Photo 
                   FROM stockitems'
        );
        $execute_variabele = $var->execute();
        $StockItems = $var->fetchAll();
    }
}
?>