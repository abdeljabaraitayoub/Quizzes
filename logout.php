<?php
session_start();
// Détruire toutes les données de session
$_SESSION = array();
session_destroy();

// Redirection vers la page de connexion
header("Location: index.php");
exit();

