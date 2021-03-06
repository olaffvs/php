<?php
    // Lees het config bestand
    require_once 'config.inc.php';

    // Lees het session-bestand
    require_once 'session.inc.php';

    // Lees alle formuliervelden
    $gender       = $_POST['gender'];
    $first_name   = $_POST['first_name'];
    $last_name    = $_POST['last_name'];
    $birth_date   = $_POST['birth_date'];
    $member_since = $_POST['member_since'];

    // Controleer of alle formuliervelden waren ingevuld
    if (strlen($first_name)   > 0 &&
        strlen($last_name)    > 0 &&
        strlen($birth_date)   > 0 &&
        strlen($member_since) > 0 &&
        strlen($gender)       > 0) {
            // Controleer of de data wel correct zijn
            $check1 = strtotime($birth_date);
            $check2 = strtotime($member_since);

            if (date('Y-m-d', $check1) == $birth_date &&
                date('Y-m-d', $check2) == $member_since) {
                    // Alle data zijn OK, maak de query
                    $query = "INSERT INTO mphp4_leden 
                             (gender, first_name, last_name, birth_date, member_since)
                             VALUES (
                                 '$gender',
                                 '$first_name',
                                 '$last_name',
                                 '$birth_date',
                                 '$member_since')";
                    
                    // Voer de query uit
                    $result = mysqli_query($mysqli, $query);

                    // Controleer het resultaat
                    if ($result) {
                        // Alles OK, stuur terug naar de homepage
                        header("Location:home.php");
                        exit;
                    }
                    else {
                        echo 'Er ging wat mis met het toevoegen';
                    }
            }
            else {
                echo 'Er is iets mis met een datum';
            } 
    }
    else {
        echo 'Niet alle velden waren ingevuld';
    }
?>