<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../includes/scripts.php'); ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Uw gegevens</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../style/gegevens.css" rel="stylesheet">

</head>
<body>
<div id="page-top">
    <!-- Navigation Bar -->
    <?php include('../includes/header.php'); ?>
    <?php include('../controller/gegevens.php'); ?>
</div>

<header class="bg-primary text-white" id="background">
    <div class="container text-center" id="banner">
        <h1>Uw persoonlijke informatie</h1>
        <p class="lead"></p>
    </div>
</header>

<div class="midden">
    <div id="personal-information">
        <section id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h5>Naam:</h5>
                        <p class="lead"><?php print($winkel[0]["FullName"]); ?> </p>
                        <ul>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section id="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h5>E-mail:</h5>
                        <p class="lead"><?php print($winkel[0]["EmailAddress"]); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h5>Wachtwoord</h5>
                        <p class="lead"><?php print("************"); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h5>Telefoonnummer</h5>
                        <p class="lead"><?php print($winkel[0]["PhoneNumber"]); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h5>Leveradres</h5>
                        <?php if (empty($winkel[0]["DeliveryAddressLine1"])) {
                            print('Nog geen leveradres ingevuld');
                        } else {
                            echo $winkel[0]["DeliveryAddressLine1"];
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </section>

        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h5>Leverpostcode</h5>
                         <?php if ($winkel[0]["DeliveryPostalCode"] == 'Empty' || $winkel[0]["DeliveryPostalCode"] == '' || empty($winkel[0]["DeliveryPostalCode"])) {
                             print('Nog geen leverpostcode ingevuld');
                         } else {
                             echo $winkel[0]["DeliveryPostalCode"];
                         }
                         ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h5>Leverwoonplaats</h5>
                         <?php if ($winkel[0]["DeliveryCityID"] == 'Empty' || $winkel[0]["DeliveryCityID"] == '' || empty($winkel[0]["DeliveryCityID"])) {
                             print('Nog geen leverwoonplaats ingevuld');
                         } else {
                             echo $winkel[0]["DeliveryCityID"];
                         }
                         ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h5>Factuuradres</h5>
                        <?php if (empty($winkel[0]["PostalAddressLine1"])) {
                            print('Nog geen factuuradres ingevuld');
                        } else {
                            echo $winkel[0]["PostalAddressLine1"];
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h5>Factuurpostcode</h5>
                       <?php if ($winkel[0]["PostalPostalCode"] == 'Empty' || $winkel[0]["PostalPostalCode"] == '' || empty($winkel[0]["PostalPostalCode"])) {
                           print('Nog geen factuurpostcode ingevuld');
                       } else {
                           echo $winkel[0]["PostalPostalCode"];
                       }
                       ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h5>Factuurwoonplaats</h5>
                       <?php if (empty($winkel[0]["PostalCityID"])) {
                           print('Nog geen factuurwoonplaats ingevuld');
                       } else {
                           echo $winkel[0]["PostalCityID"];
                       } ?>
                    </div>
                </div>
            </div>
        </section>

        <button class="button" id="info-button">Wijzigen</button>
    </div>

    <div id="edit-information" style="display:none">
        <form action="../controller/edit-info.php" method="post">
            <section id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <h5>Naam:</h5>
                            <input type="text" name="fullname" class="lead" value="<?php print($winkel[0]["FullName"]); ?>">
                            <ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <section id="services">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <h5>E-mail:</h5>
                            <input type="email" name="email" class="lead" value="<?php print($winkel[0]["EmailAddress"]); ?>">
                        </div>
                    </div>
                </div>
            </section>

            <section id="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <h5>Wachtwoord</h5>
                            <input type="password" name="pass" class="lead">
                        </div>
                    </div>
                </div>
            </section>

            <section id="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <h5>Telefoonnummer</h5>
                            <input type="text" name="phonenumber" class="lead" value="<?php print($winkel[0]["PhoneNumber"]); ?>">
                        </div>
                    </div>
                </div>
            </section>

            <section id="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <h5>Leveradres</h5>
                            <input type="text" name="deliveryaddressline" class="lead"
                                   value="<?php if (empty($winkel[0]["DeliveryAddressLine1"] || 'Empty')) {
                                       echo '';
                                   } else {
                                       echo $winkel[0]["DeliveryAddressLine1"];
                                   }
                                   ?>">
                        </div>
                    </div>
                </div>
            </section>

            <section id="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <h5>Leverpostcode</h5>
                            <input type="text" name="deliverypostalcode" class="lead"
                                   value="<?php if ($winkel[0]["DeliveryPostalCode"] == 'Empty') {
                                       print('');
                                   } else {
                                       echo $winkel[0]["DeliveryPostalCode"];
                                   }
                                   ?>
                             ">
                        </div>
                    </div>
                </div>
            </section>

            <section id="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <h5>Leverwoonplaats</h5>
                            <input type="text" name="deliverycity" class="lead"
                                   value="<?php if (empty($winkel[0]["DeliveryCityID"])) {
                                       print('');
                                   } else {
                                       echo $winkel[0]["DeliveryCityID"];
                                   }
                                   ?>">
                        </div>
                    </div>
                </div>
            </section>


            <section id="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <h5>Factuuradres</h5>
                            <input type="text" name="postaladdressline" class="lead"
                                   value="<?php if (empty($winkel[0]["PostalAddressLine1"])) {
                                       print('');
                                   } else {
                                       echo  $winkel[0]["PostalAddressLine1"];
                                   }
                                   ?>">
                        </div>
                    </div>
                </div>
            </section>

            <section id="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <h5>Factuurpostcode</h5>
                            <input type="text" name="postalpostalcode" class="lead"
                                   value="<?php if ($winkel[0]["PostalPostalCode"] == 'Empty') {
                                       print('');
                                   } else {
                                       echo $winkel[0]["PostalPostalCode"];
                                   }
                                   ?>">
                        </div>
                    </div>
                </div>
            </section>

            <section id="contact">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <h5>Factuurwoonplaats</h5>
                            <input type="text" name="postalcity" class="lead"
                                   value="<?php if (empty($winkel[0]["PostalCityID"])) {
                                       print('');
                                   } else {
                                       echo $winkel[0]["PostalCityID"];
                                   } ?>">
                        </div>
                    </div>
                </div>
            </section>

            <input type="submit" name="submit" class="button mb-1" value="Opslaan"><br>
        </form>

        <button onclick="deleteaccount()" type="submit" name="delete" class="button2 mb-1" id="delete-button">Verwijder uw account</button>

        <button class="button mb-1" id="edit-button">Terug</button>

    </div>
</div>

<!-- Footer -->
<?php include('../includes/footer.php'); ?>

<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<script src="../js/scrolling-nav.js"></script>
<script>
    $('#info-button').on('click', function () {
        $('#personal-information').css('display', 'none');
        $('#edit-information').css('display', 'block');
        $('#delete-button').css('display', 'block');
    });

    $('#edit-button').on('click', function () {
        $('#personal-information').css('display', 'block');
        $('#edit-information').css('display', 'none');
        $('#delete-button').css('display', 'none');
    });

    function deleteaccount() {
        var txt;
        if (confirm("Weet u zeker dat u uw account wilt verwijderen \nDit is niet terug te draaien")) {
            window.location.href = '../controller/delete.php';
        }
        document.getElementById("demo").innerHTML = txt;
    }

</script>
</body>

</html>