<?php 

    // Lees het config-bestand
    require_once 'config.inc.php';
    
    // Lees alle formuliervelden
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Controleer of alle formuliervelden waren ingevuld
    if (strlen($username) > 0 && strlen($password) > 0) {
        // Versleutel het wachtwoord
        $password = md5($password);

        // Maak de controle-query
        $query = "SELECT * FROM mphp4_users WHERE username = '$username' AND password = '$password'";

        // Voer de query uit
        $result = mysqli_query($mysqli, $query);


        // Controleer of de login correct was
        if (mysqli_num_rows($result) == 1) {
            // Login correct, start de sessie
            session_start();

            // Sla de username op in de sessie
            $_SESSION['username'] = $username;

            // Stuur door naar de homepage
            header("Location:home.php");
        }
        else {
            // Login incorrect, terug naar het login-formulier
            header("Location:index.php");
            exit;
        }
    }
    else {
        echo 'Niet alle velden zijn ingevuld';
        exit;
    }
?>