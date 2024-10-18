<?php
if (isset($_POST['logout'])) {
session_start();

  // Détruit toutes les variables de session
  $_SESSION = array();
    
  // Si un cookie de session existe, le détruire
  if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
          $params["path"], $params["domain"],
          $params["secure"], $params["httponly"]
      );
  }

session_destroy(); // Détruire la session
header('Location: index.php'); // Rediriger vers la page d'accueil
exit;}
?>