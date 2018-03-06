<?php 
    // Start de sessie
    session_start();

    // Vernietig de sessie
    session_destroy();

    // Ga naar de inlog pagina
    header("Location:index.php");


?>