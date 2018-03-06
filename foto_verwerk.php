<?php
    // Lees het session-bestand
    require_once 'session.inc.php';

    // Lees de informatie over de upload
    $bestand = $_FILES['foto'];

    // Controleer of de upload geslaagd is
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        // Controleer het bestand type
        if ($_FILES['foto']['type'] == "image/jpg" ||
            $_FILES['foto']['type'] == "image/jpeg" ||
            $_FILES['foto']['type'] == "image/pjpeg") {
                // Wat is de fysieke locatie van de uploads-map?
                $map = __DIR__ . "/uploads/";

                // Maak de bestandsnaam
                $bestand = $_POST['id'] . '.jpg';

                // Verplaats de upload naar de juiste map met de juiste naam
                move_uploaded_file($_FILES['foto']['tmp_name'], $map . $bestand);

                // Stuur de gebruiker terug naar de foto-pagina
                header("Location:foto.php?id=" . $_POST['id']);
            }
            else {
                echo 'Het bestand is van een verkeerd type';
            }
    }
    else {
        echo 'Er ging iets fout bij het uploaden';
    }
?>