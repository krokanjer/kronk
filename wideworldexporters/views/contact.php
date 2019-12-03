<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../style/contact.css" rel="stylesheet">
    <?php include("../includes/header.php"); ?>
</head>

<body>

<div class="contact">
    <h2>Wilt u contact opnemen met ons geweldige contactteam? <br> Dat kan! Vul het onderstaande formulier in en wij komen binnen 12 weken bij u terug!</h2>
    <br><br>

    <form method="post" name="emailform" action="../controller/contact.php">
        <label for="name">Uw naam: </label><br>
        <input type="text" name="name"><br>
        <label for="email">Uw email adres: </label><br>
        <input type="text" name="email"><br>
        <label for="message">Uw bericht: </label><br>
        <textarea type="text" name="message" rows="5" style="width: 85%; height: 300px;"></textarea><br>
        <input type="submit" name="submit" value="Deponeer uw boodschap in onze digitale brievenbus">
    </form>
</div>


</body>

<footer>
<?php include('../includes/footer.php'); ?>
</footer>


<?php
