<footer class="footer">
    <p>Réalisé par : ABDELFETTAH Lyna - Bellili Rania - Mestar Sami</p>
    <p>Mis à jour le 14/10/2024</p>
    <p>CY Cergy Paris University © 2024</p>
</footer>

<script>


class User {
    constructor(username, password) {
        this.username = username;
        this.password = password;
        this.isLoggedIn = false;
    }

    // Méthode pour se connecter (vérification du mot de passe)
    login(inputPassword) {
        if (inputPassword === this.password) {
            this.isLoggedIn = true;
            console.log(`${this.username} est connecté.`);
        } else {
            console.log("Mot de passe incorrect.");
        }
    }

    // Méthode pour se déconnecter
    logout() {
        this.isLoggedIn = false;
        console.log(`${this.username} s'est déconnecté.`);
    }

    // Méthode pour vérifier si l'utilisateur est connecté
    checkLoginStatus() {
        if (this.isLoggedIn) {
            console.log(`${this.username} est connecté.`);
        } else {
            console.log(`${this.username} n'est pas connecté.`);
        }
    }

    // Méthode pour changer le mot de passe
    changePassword(newPassword) {
        this.password = newPassword;
        console.log("Le mot de passe a été changé avec succès.");
    }
}

console.log("Test de la classe JS");


// Tester la classe User
const user1 = new User("Rania", "123456");

// Vérifier l'état de connexion
user1.checkLoginStatus();  // Alice n'est pas connecté.

// Essayer de se connecter avec le mauvais mot de passe
user1.login("wrongPassword");  // Mot de passe incorrect.

// Se connecter avec le bon mot de passe
user1.login("123456");  // Alice est connecté.

// Vérifier l'état de connexion après connexion
user1.checkLoginStatus();  // Alice est connecté.

// Changer le mot de passe
user1.changePassword("NewPassword654321");

// Se déconnecter
user1.logout();  // Alice s'est déconnecté.



// Fonction pour définir un cookie avec SameSite
function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        const date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/; SameSite=Lax";
}

// Fonction pour obtenir un cookie
function getCookie(name) {
    const nameEQ = name + "=";
    const ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) === ' ') c = c.substring(1, c.length);
    if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
return null;
}

    // Fonction pour changer le style
    function changeStyle() {
        const themeElement = document.getElementById("theme");
        if (themeElement) { // Vérifier si l'élément "theme" existe avant de l'utiliser
            const currentStyle = themeElement.getAttribute("href");
            const newStyle = currentStyle === "styles.css" ? "styles2.css" : "styles.css";
            themeElement.setAttribute("href", newStyle);

            // Changer l'image du bouton
            const iconElement = document.getElementById("theme-icon");
            if (iconElement) { // Vérifier si l'élément "theme-icon" existe avant de le modifier
                const newIcon = newStyle === "styles.css" ? "pictures/moon.svg" : "pictures/sun.svg";
                iconElement.setAttribute("src", newIcon);
            }

            // Si les cookies non indispensables sont acceptés, on enregistre le choix de style
            if (getCookie("cookiesAccepted") === "true") {
                setCookie("style", newStyle, 7); // cookie expire après 7 jours
            }
        }
    }

    // Fonction pour appliquer le style enregistré dans le cookie
    function applyStoredStyle() {
        const themeElement = document.getElementById("theme");
        if (themeElement) { // Vérifier si l'élément "theme" existe
            const storedStyle = getCookie("style");

            // Vérification que le cookie contient soit "styles.css" soit "styles2.css"
            if (storedStyle === "styles.css" || storedStyle === "styles2.css") {
                themeElement.setAttribute("href", storedStyle);

                // Changer l'image du bouton en fonction du style
                const iconElement = document.getElementById("theme-icon");
                if (iconElement) { // Vérifier si l'élément "theme-icon" existe avant de le modifier
                    const newIcon = storedStyle === "styles.css" ? "pictures/moon.svg" : "pictures/sun.svg";
                    iconElement.setAttribute("src", newIcon);
                }
            } else {
                // Si le cookie a une valeur incorrecte ou est absent, appliquer "styles.css" par défaut
                themeElement.setAttribute("href", "styles.css");

                const iconElement = document.getElementById("theme-icon");
                if (iconElement) { // Vérifier si l'élément "theme-icon" existe avant de le modifier
                    iconElement.setAttribute("src", "pictures/moon.svg");
                }
            }
        }
    }

    // Fonction pour masquer la bannière de cookies
    function hideCookieBanner() {
        const cookieBanner = document.getElementById("cookie-banner");
        if (cookieBanner) {
            cookieBanner.style.display = "none";
        }
    }

    // Fonction pour vérifier l'autorisation de cookies non indispensables
    function checkCookieConsent() {
        const cookiesAccepted = getCookie("cookiesAccepted");

        // Appliquer le style selon le cookie de consentement
        if (cookiesAccepted === "true") {
            applyStoredStyle(); // Appliquer le style du cookie si l'utilisateur a accepté
            hideCookieBanner(); // Masquer la bannière si le consentement est déjà donné
        } else if (cookiesAccepted === "false") {
            hideCookieBanner(); // Si refusé, masquer la bannière et ne pas utiliser les cookies
        }
    }

    // Fonction de gestion du consentement de cookies
    function manageCookieConsent() {
        const acceptButton = document.getElementById("accept-cookies");
        const rejectButton = document.getElementById("reject-cookies");

        // Vérifier si les boutons existent avant d'ajouter les gestionnaires d'événements
        if (acceptButton && rejectButton) {
            acceptButton.onclick = function() {
                setCookie("cookiesAccepted", "true", 30); // Accepter les cookies pour 30 jours
                applyStoredStyle(); // Appliquer le style si autorisé
                hideCookieBanner(); // Masquer la bannière
            };

            rejectButton.onclick = function() {
                setCookie("cookiesAccepted", "false", 30); // Refuser les cookies pour 30 jours
                hideCookieBanner(); // Masquer la bannière
            };
        }
    }

    // Vérifier le consentement des cookies au chargement de la page
    window.onload = function() {
        checkCookieConsent();
        manageCookieConsent(); // Gestion du consentement (si la bannière est présente)
    };
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
