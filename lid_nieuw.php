<?php
    // Lees het session-bestand
    require_once 'session.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ledenbeheer</title>
</head>
<body>
    <h1>Lid bewerken</h1>

    <form action="lid_nieuw_verwerk.php" method="post">
        <p>
            <label>
                <input type="radio" name="gender" id="gender_m" value="M" checked="checked">
                M
            </label>
                <br>
            <label>
                <input type="radio" name="gender" id="gender_f" value="F">
                F
            </label>
        </p>
        <p>
            <label for="first_name">Voornaam:</label>
            <input type="text" name="first_name" id="first_name" required="required">
        </p>
        <p>
            <label for="last_name">Achternaam:</label>
            <input type="text" name="last_name" id="last_name" required="required">
        </p>
        <p>
            <label for="birth_date">Geboortedatum:</label>
            <input type="date" name="birth_date" id="birth_date" required="required">
        </p>
        <p>
            <label for="member_since">Lid sinds:</label>
            <input type="date" name="member_since" id="member_since" required="required">
        </p>
        <p>
            <input type="submit" name="submit" id="submit" value="Opslaan">
            <button onclick="history.back();return false">Annuleren</button>
        </p>
    </form>
</body>
</html>