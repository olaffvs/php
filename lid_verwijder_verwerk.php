<?php
    // Lees het config bestand
    require_once 'config.inc.php';

    // Lees het session-bestand
    require_once 'session.inc.php';

    // Lees het id uit de URL
    $id = $_GET['id'];

    // Is het id een nummer?
    if (is_numeric($id)) {
        $result = mysqli_query($mysqli, "DELETE FROM mphp4_leden WHERE id = $id");

        // Controleer het resultaat
        if ($result) {
            // Alles OK, stuur terug naar de homepage
            header("Location:home.php");
            exit;
        }
        else {
            echo 'Er ging wat mis met het verwijderen';
        }
    }
    else {
        // Het id was geen nummer
        echo 'Onjuist ID';
        exit;
    }