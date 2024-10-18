<?php 
include './include/comptes.inc.php';


// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $login = $_POST['login'] ?? '';
  $password = $_POST['password'] ?? '';

  // Vérifier le login et le mot de passe
  if (verifierConnexion($login, $password)) {
      session_start();
      $_SESSION['login'] = $login; // Créer une session
      header('Location: page1.php'); // Redirection vers la page privée
      exit; // Arrêter l'exécution du script après la redirection
  } else {
      $message = "Login ou mot de passe incorrect";
  }
}
$description = "site web Rania BELLILI";
$title = "Log in - TD2 Rania BELLILI";
require("./include/header.inc.php");
?>
<!-- Sidebar -->
<div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasSidebarLabel">Menu</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <h3>Menu</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link text-white">Home</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Courses</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Achievements <span class="badge bg-warning text-dark">3</span></a></li>
            </ul>

            <h3 class="mt-4">Category</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link text-white">Cyber Security</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Robotics</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Artificial Intelligence</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Machine Learning</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">+ More</a></li>
            </ul>

            <h3 class="mt-4">Quiz</h3>
            <ul class="nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link text-white">Python</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">JavaScript</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">Linux Bash</a></li>
                <li class="nav-item"><a href="#" class="nav-link text-white">+ More</a></li>
            </ul>
        </div>
    </div>
<div class="form-container">
<h1>Se connecter</h1>


<div id="redirect-message">
        <p style="text-align:center;">Vous allez être redirigé vers la page d'accueil dans <span id="countDown"> 15 </span> secondes.</p>
</div>
<form method="POST" action="log-in.php">
    <label for="login">Login </label>
    <input type="text" name="login" required><br>
        
    <label for="password">Mot de passe </label>
    <input type="password" name="password" required><br>
        
    <button class="loginAccueil1" type="submit" class="login" >Se connecter</button>
</form>
</div>
<script>
// Délai de redirection en secondes
let countdownTime = 15; // à partir de 15sec

// Fonction pour mettre à jour le compte à rebours
function updateCountdown() {
    const countDownElement = document.getElementById("countDown");
            
    // Décrémenter le compteur
    countDownElement.textContent = countdownTime;

    // Si le compte à rebours est terminé, rediriger
    if (countdownTime === 0) {
        window.location.href = "index.php"; // URL cible
    } else {
                countdownTime--; // Décrémenter la variable
    }
}

// Mettre à jour le compte à rebours chaque seconde
setInterval(updateCountdown, 1000);
</script>

<?php if (isset($message)) { echo '<p style="text-align:center;color:#5b2e35;">' . $message . '</p>'; } ?>


  
<?php
$date = "17/09/2024";
require("./include/footer.inc.php");
?>
