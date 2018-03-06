<?php
    // Lees het id uit de URL
    $id = $_GET['id'];

    // Lees het session-bestand
    require_once 'session.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="foto_verwerk.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <p>
            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto" required="required">
        </p>

        <p>
            <input type="submit" name="submit" id="submit" value="uploaden">
            <button onclick="history.back();return false;">Annuleren</button>
        </p>
    </form>

    <?php 
        // Is er al een foto voor dit lid?
        if (file_exists(__DIR__ . '/uploads/' . $id . '.jpg')) {
            echo "<p><img src='uploads/" . $id . ".jpg' alt='foto'></p>";
        }
    ?>
</body>
</html>