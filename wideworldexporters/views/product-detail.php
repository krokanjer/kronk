<!-- PDO Connection To Database -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS-->
    <link href="../style/product-detail.css" rel="stylesheet">

    <!-- Navigation Bar -->
    <?php
    include("../includes/header.php"); ?>
    <?php include("../controller/product-detail.php"); ?>
    <title><?php echo (ucwords($product[0]['StockItemName'])); ?></title>

</head>

<body>
    <!-- Page Content -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <main>
        <div class="container" style="padding-top:55px">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-10">
                        <div class="card-header">
                            <nav class="header-navigation">
                                <a href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/wideworldexporters/views/products.php" class="btn btn-link">Terug naar producten</a>

                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/wideworldexporters">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Filler</a></li>
                                    <li class="breadcrumb-item"><a href="#">Filler</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Filler</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="card-body store-body">
                            <div class="product-info">
                                <div class="product-gallery">
                                    <div class="product-gallery-thumbnails">
                                        <ol class="thumbnails-list list-unstyled">
                                            <?php foreach ($product as $photo) { ?>
                                                <?php if ($photo['Photo'] != NULL) { ?>
                                                    <li><img src="../product-pictures/<?php echo $photo['Photo'] ?>" alt=""></li>
                                                <?php } else { ?>
                                                    <li><img src="https://via.placeholder.com/350x350/ffcf5b" alt=""></li>
                                                    <li><img src="https://via.placeholder.com/350x350/f16a22" alt=""></li>
                                                    <li><img src="https://via.placeholder.com/350x350/d3ffce" alt=""></li>
                                                    <li><img src="https://via.placeholder.com/350x350/7937fc" alt=""></li>
                                                    <li><img src="https://via.placeholder.com/350x350/930000" alt=""></li>
                                                <?php } ?>
                                            <?php } ?>
                                        </ol>
                                    </div>
                                    <div class="product-gallery-featured" style="width:85%">
                                        <?php if ($product[0]['Photo'] != NULL) { ?>
                                            <img src="../product-pictures/<?php echo $product[0]['Photo'] ?>" alt="">
                                        <?php } else { ?>
                                            <img src="https://via.placeholder.com/350x350/ffcf5b" alt="">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="product-seller-recommended">
                                    <h3 class="mb-5">Meer van deze verkoper </h3>
                                    <div class="recommended-items card-deck" style="margin-bottom: 45px">
                                        <div class="card">
                                            <img src="https://via.placeholder.com/157x157" alt="" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">U$ 55.00</h5>
                                                <span class="text-muted"><small>T-Shirt Size X - Large - Nickony Brand</small></span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <img src="https://via.placeholder.com/157x157" alt="" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">U$ 55.00</h5>
                                                <span class="text-muted"><small>T-Shirt Size X - Large - Nickony Brand</small></span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <img src="https://via.placeholder.com/157x157" alt="" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">U$ 55.00</h5>
                                                <span class="text-muted"><small>T-Shirt Size X - Large - Nickony Brand</small></span>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <img src="https://via.placeholder.com/157x157" alt="" class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title">U$ 55.00</h5>
                                                <span class="text-muted"><small>T-Shirt Size X - Large - Nickony Brand</small></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.recommended-items-->
                                    <div class="product-description mb-5">
                                        <h2 class="mb-5" style="margin-bottom: 30px !important">Specificaties</h2>
                                        <dl class="row mb-5" style="margin-bottom: 45px !important">
                                            <?php
                                            $merk = $product[0]['Brand'];
                                            $kleur = $product[0]['ColorName'];
                                            $maat = $product[0]['Size'];
                                            ?>
                                            <dt class="col-sm-3" style="padding-bottom: 5px">Merk</dt>
                                            <?php if ($merk != NULL) { ?>
                                                <dd class="col-sm-9"><?php echo $merk ?></dd>
                                            <?php } else { ?>
                                                <dd class="col-sm-9">Geen Merk Bekend</dd>
                                            <?php } ?>
                                            <dt class="col-sm-3" style="padding-bottom: 5px">Kleur</dt>
                                            <?php if ($kleur != NULL) { ?>
                                                <dd class="col-sm-9"><?php echo $kleur ?></dd>
                                            <?php } else { ?>
                                                <dd class="col-sm-9">Geen Kleur Bekend</dd>
                                            <?php } ?>
                                            <dt class="col-sm-3" style="padding-bottom: 5px">Maat</dt>
                                            <?php if ($maat != NULL) { ?>
                                                <dd class="col-sm-9"><?php echo $maat ?></dd>
                                            <?php } else { ?>
                                                <dd class="col-sm-9">Geen Maat Bekend</dd>
                                            <?php } ?>
                                        </dl>

                                        <h2 class="mb-5" style="margin-bottom: 30px !important">Beschrijving</h2>
                                        <?php
                                        $beschrijving = $product[0]['MarketingComments'];
                                        if ($beschrijving != NULL) { ?>
                                            <p><?php echo $beschrijving ?></p>
                                        <?php } else { ?>
                                            <p>Er is geen beschrijving beschikbaar</p>
                                        <?php } ?>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="product-payment-details">
                                <?php $aantal = $product[0]['QuantityOnHand'];
                                if ($aantal < 10) { ?>
                                    <p class="last-sold text-muted">
                                        <small>Er zijn minder dan 10 producten op voorraad</small>
                                    </p>
                                <?php } else { ?>
                                    <p class="last-sold text-muted">
                                        <small>Er zijn meer dan 10 producten op voorraad</small>
                                    </p>
                                <?php } ?>
                                <h1 class="product-title mb-2"><?php echo (ucwords($product[0]['StockItemName'])); ?></h1>
                                <h2 class="product-price"><?php echo str_replace(".", ",", "€" . $product[0]["RecommendedRetailPrice"]) ?></h2>
                                <br>
                                <p class="mb-0"><i class="fa fa-truck"></i> Binnen 12 werkweken bij u thuisbezorgd!
                                    <p>
                                        <div class="text-muted mb-2">
                                            <small>Vandaag bezorgd, morgen in huis!</small>
                                        </div>

                                        <form id="shoppingcart" method="post" action="../controller/add-shoppingbasket.php">
                                            <label for="quant">Product toevoegen</label>
                                            <input type="hidden" name="productid" value="<?php echo $product[0]['StockItemID'] ?>">
                                            <input value="1" type="number" name="amount" min="1" id="quant" class="form-control mb-5 input-lg" placeholder="Hoeveelheid">
                                            <button name="submit" class="btn btn-primary btn-lg btn-block">In mijn winkelmandje
                                            </button>
                                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="<?php $_SERVER['DOCUMENT_ROOT'] ?>/wideworldexporters/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/product-detail.js"></script>
</body>

</html>