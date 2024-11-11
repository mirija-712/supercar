<?php
// Démarrer la session
session_start();

// Détruire toutes les variables de session en les remplaçant par un tableau vide
$_SESSION = array();

// Si vous voulez détruire complètement la session, effacez également le cookie de session.
// Notez bien : cela détruira la session et pas seulement les données de session !
if (ini_get("session.use_cookies")) {
    // Obtenir les paramètres du cookie de session
    $params = session_get_cookie_params();
    // Effacer le cookie de session en définissant une date d'expiration passée (time() - 42000)
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Détruire complètement la session
session_destroy();

// Rediriger vers la page de connexion
header("Location: ../index.php");
// Assurer que le script s'arrête après la redirection
exit();
?>
