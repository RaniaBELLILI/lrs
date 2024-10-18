<?php

// Chemin du fichier CSV contenant les comptes
$comptes_file = 'comptes.csv';

// Charger les comptes à partir du fichier CSV
function chargerComptes() {
    global $comptes_file;
    $comptes = [];
    
    if (!file_exists($comptes_file)) {
        return $comptes; // Retourner un tableau vide si le fichier n'existe pas
    }
    
    // Ouvrir le fichier CSV en lecture
    if (($handle = fopen($comptes_file, 'r')) !== false) {
        while (($data = fgetcsv($handle)) !== false) {
            // Chaque ligne du CSV contient [login, hashed_password]
            $comptes[$data[0]] = $data[1];
        }
        fclose($handle);
    }
    
    return $comptes;
}

// Sauvegarder les comptes dans le fichier CSV
function sauvegarderComptes($comptes) {
    global $comptes_file;
    
    // Ouvrir le fichier CSV en écriture
    if (($handle = fopen($comptes_file, 'w')) !== false) {
        foreach ($comptes as $login => $hashed_password) {
            fputcsv($handle, [$login, $hashed_password]);
        }
        fclose($handle);
    }
}

// Créer un nouveau compte avec login et mot de passe chiffré
function creerCompte($login, $password) {
    $comptes = chargerComptes();
    if (isset($comptes[$login])) {
        return false; // Le compte existe déjà
    }
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $comptes[$login] = $hashed_password;
    sauvegarderComptes($comptes);
    return true;
}

// Vérifier les informations de connexion
function verifierConnexion($login, $password) {
    $comptes = chargerComptes();
    if (!isset($comptes[$login])) {
        return false; // Compte non trouvé
    }
    $hashed_password = $comptes[$login];
    return password_verify($password, $hashed_password);
}


// Fonction pour gérer la déconnexion
function deconnexion() {
    // Détruit toutes les variables de session
    $_SESSION = array();
    
    
    session_destroy(); // Détruit la session
    header('Location: index.php'); // Redirige vers la page de connexion
    exit();
}

?>
