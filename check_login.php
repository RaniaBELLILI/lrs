<?php
header("Content-Type: application/json");
require_once('connect_db.php');
include './include/comptes.inc.php';

$login = $_GET['login'] ?? '';  // Récupère le login depuis la requête AJAX
$stmt=$conn->prepare("select * from utilisateur where nom=:nom");
    $stmt->execute([
        'nom' => $login,
    ]);
$users=$stmt->fetchAll();    
$isAvailable = empty($users);  // Vérifie si le login est déjà pris

// Envoie la réponse en JSON pour indiquer si le pseudo est disponible
echo json_encode(['available' => $isAvailable]);
?>
