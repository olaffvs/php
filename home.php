<?php
    // Lees het config-bestand
    require_once 'config.inc.php';

    // Lees het session-bestand
    require_once 'session.inc.php';

    // Lees alle leden uit de tabel
    $result = mysqli_query($mysqli, "SELECT * FROM mphp4_leden ORDER BY last_name ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal sprint</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <h1>Alle leden</h1>
    <div class="body-table">
        <table>
            <tr>
                <th>ID</th>
                <th>Geslacht</th>
                <th>Voornaam</th>
                <th>Achternaam</th>
                <th>Geboortedatum</th>
                <th>Lid sinds</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <?php
                // Loop door alle rijen data heen
                while ($row = mysqli_fetch_array($result)) {
                    // Start een tabelrij
                    echo "<tr>";
                        // Maak de cellen voor de gegevens
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['gender'] . "</td>";
                        echo "<td>" . $row['first_name'] . "</td>";
                        echo "<td>" . $row['last_name'] . "</td>";
                        echo "<td>" . $row['birth_date'] . "</td>";
                        echo "<td>" . $row['member_since'] . "</td>";
                        echo "<td><a href='lid_bewerk.php?id=" . $row['id'] . "'>Bewerk</a></td>";
                        echo "<td><a href='lid_verwijder.php?id=" . $row['id'] . "'>Verwijder</a></td>";
                        echo "<td><a href='foto.php?id=" . $row['id'] . "'>Foto</a></td>";
                    // Sluit de tabelrij
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
        <p>
            <a href="lid_nieuw.php">Klik hier</a> om een nieuw lid in te schrijven.
        </p>

        <p>
            Je bent ingelogd als <?php echo $_SESSION['username']; ?><br>
            <a href="logout.php">Klik hier</a> om uit te loggen.
        </p>
</body>
</html>