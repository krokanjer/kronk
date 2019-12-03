<!-- Start HTML -->
<!DOCTYPE html>
<html lang="en">
<script src="https://kit.fontawesome.com/150e9640c7.js" crossorigin="anonymous"></script>
<!-- Header -->

<head>
    <?php if (!isset($_SESSION)) {
        session_start();
    } ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/wideworldexporters/images/wwi-logo.png"/>

    <!-- Bootstrap core CSS -->
    <link href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/wideworldexporters/vendor/bootstrap/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- stijl voor zoekbalk -->
    <link href="<?php $_SERVER['DOCUMENT_ROOT']; ?> /wideworldexporters/style/zoekbalk.css" rel="stylesheet">

</head>

<body>
<!-- Navigation -->
<nav style="height: 60px" class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Wide World Importers Logo -->
        <a href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/wideworldexporters">
            <img style="height: 60%; width: 60%"
                 src="<?php $_SERVER['DOCUMENT_ROOT']; ?>/wideworldexporters/images/wwi-logo.png" </a>
        <!-- Navigation Bar -->
        <div style="" class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/wideworldexporters">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                       href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/wideworldexporters/views/products.php">Producten</a>
                </li>
                <?php if (isset($_SESSION['user_id'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/wideworldexporters/views/Gegevens.php">Mijn
                            account</a>
                    </li>

                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link"
                               href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/wideworldexporters/views/adminpanel/dashboard.php">Medewerkersportaal</a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/wideworldexporters/controller/logout.php">Uitloggen</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/wideworldexporters/views/login.php">Inloggen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/wideworldexporters/views/register.php">Registreren</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?php $_SERVER['DOCUMENT_ROOT']; ?>/wideworldexporters/views/contact.php">Contact</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
        <!-- Search Bar -->
        <form>
            <input id="searchterm" type="search" name="search" placeholder="Zoek hier...">
        </form>
    </div>

</nav>
<div style="margin-top:40px;text-align:center;margin-left: 1060px;background:white;border:solid lightgrey 1px;height:auto;min-height: 100px;max-height:400px;width:450px;position:fixed;z-index: 10;border-bottom-right-radius: 5px;border-bottom-left-radius:5px;">
    <div id="search-results">

    </div>
    <div style="margin-left: 2.5%;position:absolute;bottom:0;border-top: solid lightgrey 1px;width:95%;padding: 10px 0 10px 0;text-align:center;">

        <a href="#" style="text-decoration: none;color:darkslategray">Meer</a>
    </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $('#searchterm').on('input', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: 'controller/dynamic-search.php',
                dataType: 'json',
                data: $(this).serialize(),
                success: function (res) {
                    res.forEach(function(product) {
                        console.log(product.StockItemName);
                    });
                }
            });
        });
    });
</script>