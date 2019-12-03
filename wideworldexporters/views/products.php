<!-- PDO Connection To Database -->
<?php include('../controller/products.php'); ?>

<!-- Start HTML -->

<!DOCTYPE html>
<html lang="en">

<!-- Header -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Producten</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS File -->
    <link href="../style/product-page.css" rel="stylesheet">

</head>

<!-- Body -->

<body>
    <!-- Header Include -->
    <?php include('../includes/header.php'); ?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h2 class="my-4"><a href="http://localhost/wideworldexporters/views/products.php" </a>Producten </h2> <?php $y = 0;
                                                                                                                        foreach ($StockGroups as $key) { ?> <div class="list-group">
                        <a href="products.php?stockgroupname=<?php echo $StockGroups[$y]["StockGroupName"]; ?>" class="list-group-item"><?php print($StockGroups[$y]["StockGroupName"]) ?></a>
            </div>
        <?php
            $y++;
        }
        ?>
        </div>

        <!-- /.col-lg-3 -->
        <div class="col-lg-9">

            <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div style="height: 300px" class="carousel-item active">
                        <img class="d-block img-fluid" src="https://via.placeholder.com/850x300/343A40/ffffff?text=WideWorldImporters" alt="First slide">
                    </div>
                    <div style="height: 300px" class="carousel-item">
                        <img class="d-block img-fluid" src="https://via.placeholder.com/850x300/343A40/ffffff?text=WideWorldImporters" alt="Second slide">
                    </div>
                    <div style="height: 300px" class="carousel-item">
                        <img class="d-block img-fluid" src="https://via.placeholder.com/850x300/343A40/ffffff?text=WideWorldImporters" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

            <!-- Categories -->
            <div class="row">
                <?php
                if (!empty($_GET['search'])) {
                    if (empty($StockItems)) {
                        print strip_tags("<h1>Geen zoekresultaten voor term: " . $_GET['search'] . "</h1>");
                    }
                }

                $x = 0;
                $z = 0;
                foreach ($StockItems as $key) {
                    ?>


                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <?php if (!empty($StockItems[$z]["Photo"])) { ?>
                                <a href="product-detail.php?productid=<?php echo $StockItems[$x]['StockItemID'] ?>"><img class="card-img-top" src="../product-pictures/<?php print($StockItems[$z]["Photo"]); ?>" alt=""></a>
                            <?php } else { ?>
                                <a href="product-detail.php?productid=<?php echo $StockItems[$x]['StockItemID'] ?>"><img class="card-img-top" src="../images/geen-afbeelding.png" alt=""></a>
                            <?php } ?>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="product-detail.php?productid=<?php echo $StockItems[$x]['StockItemID'] ?>"><?php print(ucwords($StockItems[$x]["StockItemName"])) ?></a>
                                </h4>
                                <h5><?php echo str_replace(".", ",", "€" . $StockItems[$x]["RecommendedRetailPrice"]) ?></h5>
                                <p class="card-text"><?php print($StockItems[$x]["SearchDetails"]) ?></p>
                            </div>
                            <!-- <div class="card-footer">
                                    <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                </div> -->
                        </div>
                    </div>
                <?php
                    $x++;
                    $z++;
                }
                ?>

                <!-- /.row -->
            </div>
        </div>

        <!-- /.col-lg-9 -->
    </div>

    <!-- /.row -->
    </div>

    <!-- /.container -->

    <!-- Footer -->
    <?php include('../includes/footer.php'); ?>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>