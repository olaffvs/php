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
    else {
        // Het id was geen nummer
        echo 'Onjuist id';
        exit;
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
    <h1>Lid verwijderen</h1>

    <p>
        Weet je zeker dat je het lid
        <strong><?php echo $row['first_name'] . " " . $row['last_name']; ?></strong>
        wilt verwijderen?
    </p>

    <p>
        <a href="lid_verwijder_verwerk.php?id=<?php echo $id; ?>">Ja, verwijderen</a>
        /
        <a href="home.php">Nee, terug</a>
    </p>
</body>
</html>