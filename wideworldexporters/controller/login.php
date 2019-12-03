<?php
//Connection
session_start();
include('../includes/connection.php');
$connect = new connection();

if (!empty($_POST['email']) && !empty($_POST['password'])) {

    //Vergelijk email met bestaande emails om password hash op te halen
    $user_query = $connect->connect()->prepare('SELECT * FROM people WHERE LogonName = :email');
    $executed = $user_query->execute(array(
        ':email' => $_POST['email']
    ));
    $result = $user_query->fetchAll();

    //Als password hash is opgehaald, check of de gegevens goed zijn
    if ($executed) {
        $query = $connect->connect()->prepare('SELECT * FROM people WHERE LogonName = :email AND HashedPassword = :password');

        //Unhash password
        foreach ($result as $hash) {
            if ($hash['IsPermittedToLogon'] == 1) {
                $user_id = $hash['PersonID'];
                $employee = $hash['IsEmployee'];
                $fullname = $hash['FullName'];

                $password_hash = password_verify($_POST['password'], $hash['HashedPassword']);
                //Execute
                $query->execute(array(
                    ':email' => $_POST['email'],
                    ':password' => $password_hash
                ));
            } else {
                echo json_encode(array(
                    'success' => false,
                    'warning' => '&nbsp Je account is nog niet geactiveerd &nbsp'
                ));
            }
        }

        //Als er is ingelogd, zet session naar true
        if ($password_hash == true) {
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['employee'] = $employee;
            $_SESSION['fullname'] = $fullname;
            echo json_encode(array(
                'success' => true,
                'user_id' => $user_id,
            ));
            die;
        } else {
            echo json_encode(array(
                'success' => false,
                'warning' => '&nbsp Verkeerde gebruikersnaam of wachtwoord &nbsp'
            ));
            die;
        }
    } else {
        echo json_encode(array(
            'success' => false,
            'warning' => '&nbsp Kon niet worden uitgevoerd &nbsp'
        ));
    }
} else {
    echo json_encode(array(
        'success' => false,
        'warning' => '&nbsp Niet alle velden zijn ingevuld &nbsp'
    ));
}