<!-- PDO Connection To Database -->
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("../controller/products.php");
    $query = $connect->connect()->prepare("SELECT StockItemName, SearchDetails, RecommendedRetailPrice FROM
    stockitems WHERE StockItemID = :productID;");
    $execute = $query->execute(array(
        ":productID" => $_GET["productid"]
    ));
    $product = $query->fetchAll();
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Item - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../style/shoppingbasket.css" rel="stylesheet">

</head>

<body>
<!-- Navigation Bar -->
<?php include("../includes/header.php"); ?>

<!-- Page Content -->
<div class="container" style="margin-top: 60px">

    <div class="row">

        <div class="col-lg-3">
            <h1 class="my-4">Wide World Importers</h1>
            <div class="list-group">
                <?php
                $y = 0;
                foreach ($StockGroups as $key) {
                    ?>
                    <div class="list-group">
                        <a href="products.php?stockgroupname=<?php echo $StockGroups[$y]["StockGroupName"]; ?>"
                           class="list-group-item"><?php print($StockGroups[$y]["StockGroupName"]) ?></a>
                    </div>
                    <?php
                    $y++;
                }
                ?>
            </div>
        </div>
        <!-- /.col-lg-3 -->
        <div class="col-lg-9">
            <div class="shopping-cart">
                <!-- Title -->
                <div class="title">
                    Winkelmandje
                </div>

                <!-- Product #1 -->

                <?php
                foreach ($_SESSION['shoppingcart'] as $shoppingcart => $amount) {
                    $cart_query = $connect->connect()->prepare('SELECT si.StockItemName, si.StockItemID, si.RecommendedRetailPrice , sp.Photo
                                                                          FROM stockitems si
                                                                          LEFT JOIN stockphotos sp ON si.StockItemID = sp.StockItemID
                                                                          WHERE si.StockItemID = :cart_id
                                                                          ');
                    $cart_query->execute(array(
                        ':cart_id' => $shoppingcart
                    ));
                    $cart = $cart_query->fetchAll();
                    ?>
                    <div id="<?php echo $cart[0]['StockItemID'] ?>"
                         style="border-bottom: solid 1px lightgray;display:inline-block;">
                        <div style="float:left;padding-top:60px;">
                            <button class="delete-btn"><a style="text-decoration: none;color:black"
                                                          href="../controller/remove-shoppingcart-element.php?productid=<?php echo $cart[0]['StockItemID'] ?>"><i
                                            class="fas fa-trash"></i></a></button>
                        </div>

                        <div style="float:left;margin: 5px 20px 5px 0;">
                            <?php if (isset($cart[0]['Photo'])) { ?>
                                <img src="../product-pictures/<?php echo $cart[0]["Photo"]; ?>" alt="" height="150"
                                     width="150">
                            <?php } else { ?>
                                <img src="../images/geen-afbeelding.png" alt="no-image" height="150" width="150">
                            <?php } ?>
                        </div>

                        <div style="padding-top: 60px;float:left;max-width:250px;">
                            <a style="text-decoration: none;color:black;outline:none;"
                               href="product-detail.php?productid=<?php echo $cart[0]['StockItemID']; ?>"><span><?php echo($cart[0]['StockItemName']); ?></span></a>
                        </div>

                        <div style="display:none;" class="calc-product"><?php echo $cart[0]['RecommendedRetailPrice'] * $amount ?></div>

                        <div class="total-product"
                             style="float:right;padding-top:60px"><?php echo('€' . number_format($cart[0]['RecommendedRetailPrice'] * $amount, 2, ',', '')); ?></div>

                        <div style="float:right;padding-top:60px;margin: 0 20px 0 20px;">
                            <button style="outline: none;" class="minus-btn" type="button" name="button">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input style="width:20px;border:none;text-align:center;" readonly min="1"
                                   id="<?php $cart[0]['StockItemID'] ?>" type="text" name="amount"
                                   value="<?php echo $amount ?>">
                            <button style="outline:none" class="plus-btn" type="button" name="button">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                        <div style="float:right;padding-top:60px;"><?php echo('€' . number_format((float)$cart[0]['RecommendedRetailPrice'], 2, ',', '')); ?></div>
                        <div style="display:none;"><?php echo $cart[0]['RecommendedRetailPrice'] ?></div>
                    </div>
                    <?php
                } ?>
                <div style="float:right" class="total-price">
                    <?php echo('Totaal: €' . number_format($cart[0]['RecommendedRetailPrice'] * $amount, 2, ',', '')); ?>
                </div>
                <div class="calc-total">
                    <?php echo $cart[0]['RecommendedRetailPrice'] * $amount; ?>
                </div>
            </div>
            <!-- /.card -->

            <div class="card card-outline-secondary my-4">
                <div class="card-header">
                    Recent bekeken producten
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <img src="../product-pictures/<?php echo $product[0]["Photo"]; ?>" alt=""
                                         style="width: auto; height: 90%; max-width: 40%; float: left; padding: 4px; border: 1px solid grey; margin: 4px 0 4px 4px;"
                                         align="top">
                                    <h5 class="card-title"><?php echo($product[0]['StockItemName']); ?></h5>
                                    <a href="#" class="btn btn-primary">Voeg toe aan winkelmand</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <img src="../product-pictures/<?php echo $product[0]["Photo"]; ?>" alt=""
                                         style="width: auto; height: 90%; max-width: 40%; float: left; padding: 4px; border: 1px solid grey; margin: 4px 0 4px 4px;"
                                         align="top">
                                    <h5 class="card-title"><?php echo($product[0]['StockItemName']); ?></h5>
                                    <a href="#" class="btn btn-primary">Voeg toe aan winkelmand</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body">
                                    <img src="../product-pictures/<?php echo $product[0]["Photo"]; ?>" alt=""
                                         style="width: auto; height: 90%; max-width: 40%; float: left; padding: 4px; border: 1px solid grey; margin: 4px 0 4px 4px;"
                                         align="top">
                                    <h5 class="card-title"><?php echo($product[0]['StockItemName']); ?></h5>
                                    <a href="#" class="btn btn-primary">Voeg toe aan winkelmand</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

    </div>

</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>

    $('.minus-btn').on('click', function (e) {
        e.preventDefault();
        var value = $(this).next();
        value.val(value.val() - 1);

        if (value.val() >= 2) {
            value.val(value.val() - 1);
        } else {
            value.val(1);
        }


        var current = $(this).parent().next().next().html();
        $(this).parent().prev().text('€' + Math.round((value.val() * current) * 100) / 100);
    });

    $('.plus-btn').on('click', function (e) {
        e.preventDefault();
        var value = $(this).prev();
        value.val(+value.val() + 1);

        var current = $(this).parent().next().next().html();
        $(this).parent().prev().text('€' + Math.round((value.val() * current) * 100) / 100);

        $(this).parent().prev().prev().text(Math.round((value.val() * current) * 100) / 100);

        $('.calc-product').each(function () {
            console.log($(this).html());
        });
    });
</script>

</body>

</html>

