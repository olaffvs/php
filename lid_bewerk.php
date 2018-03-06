<?php
    // Lees het config-bestand
    require_once 'config.inc.php';

    // Lees het session-bestand
    require_once 'session.inc.php';

    // Lees het id uit de URL
    $id = $_GET['id'];

    // Is het id een nummer?
    if (is_numeric($id)) {

        // Lees het lid uit de database
        $result = mysqli_query($mysqli, "SELECT * FROM mphp4_leden WHERE id = $id");

        // Is er een lid gevonden met dit id?
        if (mysqli_num_rows($result) == 1) {
            // Ja, lees het lid uit de dataset
            $row = mysqli_fetch_array($result);
        }
        else {
            echo 'Geen lid gevonden';
            exit;
        }
    }
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

    <form action="lid_bewerk_verwerk.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <p>
            <label>
                <input type="radio" name="gender" id="gender_m" value="M" 
                <?php if($row['gender'] == 'M') echo 'checked="checked"'; ?>>
                M
            </label> <br>
            <label>
                <input type="radio" name="gender" id="gender_f" value="F"
                <?php if($row['gender'] == 'F') echo 'checked="checked"'; ?>>
                F
            </label>
        </p>
        <p>
            <label for="first_name">Voornaam:</label>
            <input type="text" name="first_name" id="first_name" required="required"
            value="<?php echo $row['first_name']; ?>">
        </p>
        <p>
            <label for="last_name">Achternaam:</label>
            <input type="text" name="last_name" id="last_name" required="required"
            value="<?php echo $row['last_name']; ?>">
        </p>
        <p>
            <label for="birth_date">Geboortedatum:</label>
            <input type="date" name="birth_date" id="birth_date" required="required"
            value="<?php echo $row['birth_date']; ?>">
        </p>
        <p>
            <label for="member_since">Lid sinds:</label>
            <input type="date" name="member_since" id="member_since" required="required"
            value="<?php echo $row['member_since']; ?>">
        </p>
        <p>
            <input type="submit" name="submit" id="submit" value="Opslaan">
            <button onclick="history.back();return false">Annuleren</button>
        </p>
    </form>
</body>
</html>