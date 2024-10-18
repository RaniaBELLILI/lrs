<?php
header("Content-Type: application/json");
include './include/comptes.inc.php';

$login = $_GET['login'] ?? '';  // Récupère le login depuis la requête AJAX
$comptes = chargerComptes();  // Charge tous les comptes

$isAvailable = !isset($comptes[$login]);  // Vérifie si le login est déjà pris

// Envoie la réponse en JSON pour indiquer si le pseudo est disponible
echo json_encode(['available' => $isAvailable]);
?>
