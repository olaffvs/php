<?php
    // Start de sessie
    session_start();

    // Controleer of er een username is opgeslagen
    if (!isset($_SESSION['username']) || strlen($_SESSION['username']) == 0) {
        // Geen geldige login, stuur naar het inlogformulier
        header("Location:index.php");
        exit;
    }
?>