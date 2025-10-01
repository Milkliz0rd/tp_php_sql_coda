<?php
require __DIR__ . '/../config/session.php';
 unset($_SESSION['user']); // Détruit la session utilisateur
 header('Location: ./index.php'); // Redirige vers la page de connexion
 exit;
?>

