<?php
// Démarrez la session
session_start();

// Détruire toutes les données de session
session_destroy();

// Rediriger vers la page de connexion ou une autre page appropriée
header('Location: /login.php');
exit;
?>
