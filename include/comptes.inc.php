<?php
include 'include/debug.inc.php';
include_once 'connect_db.php';
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
function creerCompte($login, $password,$mail,$conn) {
    $stmt = $conn->prepare("select * from utilisateur where nom=:login");
    $stmt->execute([
        'login' => $login,
        ]);
    $users=$stmt->fetchAll();
    error_log(print_r($users, true));
    if (!empty($users)) {
        return false; // Le compte existe déjà
    }
    $hashed_password = password_hash($password,0);
    $stmt=$conn->prepare("insert into utilisateur (nom, password, mail) values (:nom,:password,:mail)");
    $stmt->execute([
        'nom' => $login,
        'password' => $hashed_password,
        'mail' => $mail
    ]);
    return true;
}

// Vérifier les informations de connexion
function verifierConnexion($login, $password,$conn) {
    $stmt=$conn->prepare("select password from utilisateur where nom=:nom");
    $stmt->execute([
        'nom' => $login,
    ]);
    $user=$stmt->fetchAll();
    if (empty($user)){
        return False;
    }
    $hashed_password=$user[0]['password'];
    if (password_verify($password, $hashed_password)){
        error_log("yes");
    }
    else{
        error_log($password);
        error_log("no");
    }
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
