<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Verbinding met Producten -->
    <?php include('controller/products.php'); ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <title>World Wide Importers</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="style/index.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <?php include('includes/header.php'); ?>

    <!-- Page Content -->
    <div class="carouselding">
        <link href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css" rel="stylesheet">
        <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="mask flex-center">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-7 col-12 order-md-1 order-2" style="padding-left: 100px">
                                    <h4 style="color: #212b35">Snelle Verzending</h4>
                                    <p style="color: #212b35">Alle aankopen worden binnen 12 werkweken bij uw thuis bezorgd.</p>
                                </div>
                                <div class="col-md-5 col-12 order-md-2 order-1"><img src="https://i.imgur.com/NKvkfTT.png" class="mx-auto" alt="slide"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="mask flex-center">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-7 col-12 order-md-1 order-2" style="padding-left: 100px">
                                    <h4 style="color: #212b35">Altijd Garantie!</h4>
                                    <p style="color: #212b35">Bij elk product krijgt u een standaard garantie van twee dagen. <br> Daarna is het volledig eigen risico.</p>
                                </div>
                                <div class="col-md-5 col-12 order-md-2 order-1"><img src="https://i.imgur.com/duWgXRs.png" class="mx-auto" alt="slide"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="mask flex-center">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-md-7 col-12 order-md-1 order-2" style="padding-left: 100px">
                                    <h4 style="color: #212b35">24 uur per dag!</h4>
                                    <p style="color: #212b35">Wij zijn ten alle tijden beschikbaar voor contact! <br> Neem contact met ons op via het contact formulier.</p>
                                </div>
                                <div class="col-md-5 col-12 order-md-2 order-1"><img src="https://i.imgur.com/DGkR4OQ.png" class="mx-auto" alt="slide"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev" style="margin-top: 250px; padding-right: 150px">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span> </a>

            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next" style="color: #212b35; margin-top: 250px; padding-left: 150">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span> </a>
        </div>
    </div>

    <!-- Begin -->
    <div class="container my-4">

        <div>
            <h3><strong>Laatst bekeken producten</strong>
        </div>
        <hr class="my-4">

        <?php if (isset($_SESSION['previousproducts'])) { ?>
            <!--Carousel Wrapper-->
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                <!--Controls-->
                <div class="controls-top">
                    <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                    <a class="btn-floating" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                </div>

                <!--Slides-->
                <div class="carousel-inner" role="listbox">

                    <?php
                        $productids = implode(",", $_SESSION['previousproducts']);
                        $get_prev_products = $connect->connect()->query('SELECT * FROM stockitems WHERE StockItemID IN (' . $productids . ')', PDO::FETCH_ASSOC);
                        $prev_products = array();
                        foreach ($get_prev_products as $row) {
                            array_push($prev_products, $row);
                        }
                        $prev_products = array_chunk($prev_products, 3);
                        ?>

                    <!--First slide-->
                    <?php for ($i = 0; $i < count($prev_products); $i++) { ?>
                        <div class="carousel-item <?php if ($i == 0) {
                                                                print("active");
                                                            } ?>">
                            <div class="row">
                                <?php
                                        foreach ($prev_products[$i] as $product) {
                                            ?>
                                    <div class="col-md-4 clearfix d-none d-md-block">
                                        <div class="card mb-2">
                                            <?php if (!empty($product["Photo"])) { ?>
                                                <a href="/wideworldexporters/views/product-detail.php?productid=<?php echo $product['StockItemID'] ?>"><img class="card-img-top" src="product-pictures/<?php echo $product['Photo']; ?>" alt=""></a>
                                            <?php } else { ?>
                                                <a href="/wideworldexporters/views/product-detail.php?productid=<?php echo $product['StockItemID'] ?>"><img class="card-img-top" src="images/geen-afbeelding.png<?php echo $product['Photo']; ?>" alt=""></a>
                                            <?php } ?>
                                            <div class="card-body">
                                                <h4 class="card-title"><?php echo $product['StockItemName']; ?></h4>
                                                <p class="card-text"><?php echo $product['SearchDetails']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                    <!--/.First slide-->
                </div>
                <!--/.Slides-->

            </div>
            <!--/.Carousel Wrapper-->
        <?php } else {
            echo "U heeft nog geen producten bekeken.";
        } ?>
    </div>

    <div class="container my-4">
        <div>
            <h3><strong>Meest bekeken producten</strong>
        </div>
        <hr class="my-4">
    </div>


    </div>
    <!-- Footer -->
    <?php include('includes/footer.php'); ?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/product-carousel.js"></script>
    <script src="js/item-carousel.js"></script>

</body>

</html>