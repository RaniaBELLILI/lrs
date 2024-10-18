<?php
include './include/comptes.inc.php';

if (isset($_POST['login'], $_POST['password'])) {
    $login = $_POST['login'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);  // Hachage sécurisé du mot de passe

    // Appel à une fonction (ex : creerCompte) pour ajouter le compte s'il est disponible
    if (creerCompte($login, $password)) {
        session_start();
        $_SESSION['login'] = $login;  // Enregistre le login dans la session
        header('Location: page1.php'); // Redirection vers la page privée après inscription
        exit();
    } else {
        $message = "Le compte existe déjà."; // Message d'erreur si le compte existe
    }
}

$description = "site web Rania BELLILI";
$title = "Sign up - TD2 Rania BELLILI";
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
<h1>Créer un compte</h1>


<!-- Formulaire de création de compte -->
<form method="POST" action="sign-up.php">

    <label for="login">Email </label>
    <input type="text" name="mail" id="mail" required>

    <label for="login">Pseudo  </label>
    <input type="text" name="login" id="login" required>
    <!-- Zone pour afficher la disponibilité du login -->
    <span id="loginStatus"></span>
    
    <label for="password">Mot de passe </label>
    <input type="password" name="password" required><br>
    
    <button class="loginAccueil1" type="submit" class="login">Créer mon compte</button>
</form>

<!-- Affichage du message d'erreur si le compte existe déjà -->
<?php if (isset($message)) { echo '<p style="text-align:center;color:#5b2e35;">' . $message . '</p>'; } ?>
</div>

<!-- Script AJAX (API fetch) pour vérifier la disponibilité du login -->
<script>
    // Ajout d'un événement 'blur' sur l'input login
    //Le blur est un événement qui se déclenche quand l’utilisateur quitte (ou "floute") le champ login.
    // Cet événement permet de déclencher la vérification seulement quand l’utilisateur a fini d’entrer un pseudo
    document.getElementById("login").addEventListener("blur", function() {
        const login = this.value;// Récupère la valeur entrée par l'utilisateur dans le champ login
        if (login) {// Si l'utilisateur a saisi quelque chose
             // Envoie une requête AJAX vers 'check_login.php' avec le login
            // càd : On appelle l'API `fetch()` en lui passant l'URL de la page 'check_login.php'
            fetch(`check_login.php?login=${login}`)
                // fetch() renvoie une promesse. Lorsque nous aurons reçu
                // une réponse du serveur, le gestionnaire then() de la
                // promesse sera appelé avec la réponse
                .then(response => response.json())// Attend et transforme la réponse en JSON
                // Quand response.json() a réussi, son gestionnaire `then()` est appelé
                .then(data => { // Lorsque les données sont prêtes
                    const status = document.getElementById("loginStatus");// Sélectionne l'élément HTML pour afficher le statut
                    if (data.available) {// Si le login est disponible
                        status.textContent = "Pseudo disponible";// Affiche le message en vert
                        status.style.color = "green";
                    } else {// Si le login est déjà pris
                        status.textContent = "Pseudo déjà pris";// Affiche le message en rouge
                        status.style.color = "red";
                    }
                })
                  // On intercepte les éventuelles erreurs et on affiche un message dans la console
                .catch(error => { // Gestion des erreurs, si la requête échoue
                    console.error("Erreur lors de la vérification du pseudo:", error);
                });
        }
    });
</script>

<?php
$date = "17/09/2024";
require("./include/footer.inc.php");
?>
