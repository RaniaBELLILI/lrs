<?php 
session_start();
if (!isset($_SESSION['login'])) {
    // Redirige vers la page de connexion si l'utilisateur n'est pas connecté
    setCookie("PHPSESSID","deleted", time()-365*24*3600);
    header('Location: log-in.php');
    exit();
}
$login = $_SESSION['login'];
$description = "Your gateway to the latest in computer technology";
$title = "LRS Learn the Right Skills";
require("./include/header.inc.php");
?>
<h1 style=" margin-top: 20px;margin-left: 20px;">Bienvenue, <?php echo htmlspecialchars($login); ?> !</h1>
<section class="sectionContener">
<h2 style="margin-top: 30px;">Everything Announced at Meta Connect 2024: Quest 3S, Orion AR glasses and Meta AI updates</h2>
<img  class="img" src="./pictures/marc.png" alt="facebook">
            <p>Although Meta Connect 2024 lacked a marquee high-end product for the  holiday season, 
                it still included a new budget VR headset and a tease of the “magic glasses” Meta’s XR
                 gurus have been talking about for the  better part of a decade. In addition, the company 
                 keeps plowing forward  with new AI tools for its Ray-Ban glasses and social platforms.
                  Here’s  everything the company announced at Meta Connect 2024.</p>
</section>
<!-- Bouton de déconnexion -->
<form method="POST" action="deconnexion.php">
        <button type="submit" name="logout" class="btn btn-warning">Déconnexion</button>
    </form>

<?php
$date = "17/09/2024";
require("./include/footer.inc.php");
?>