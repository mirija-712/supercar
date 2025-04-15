<?php
// Démarrer la session
session_start();

// Empêcher la mise en cache du navigateur
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

include("../../../include_bdd/connexion.bdd.php");

// Vérifier la connexion à la base de données
if ($connexion->connect_error) {
    die("Erreur de connexion à la base de données : " . $connexion->connect_error);
}

if (isset($_SESSION['nom_utilisateur'])) {
    // Vérifier si la table historique_connexion existe
    $check_historique = "SHOW TABLES LIKE 'historique_connexion'";
    $result_hist = $connexion->query($check_historique);
    if ($result_hist->num_rows == 0) {
        die("La table historique_connexion n'existe pas");
    }
    
    // Enregistrer la déconnexion dans l'historique
    $sql_historique = "INSERT INTO historique_connexion (nom_utilisateur, type_action) VALUES (?, 'deconnexion')";
    $stmt_historique = $connexion->prepare($sql_historique);
    if ($stmt_historique === false) {
        die("Erreur de préparation historique : " . $connexion->error);
    }
    
    $stmt_historique->bind_param("s", $_SESSION['nom_utilisateur']);
    if (!$stmt_historique->execute()) {
        die("Erreur d'exécution historique : " . $stmt_historique->error);
    }
    
    // Détruire complètement la session
    $_SESSION = array(); // Vide le tableau de session
    
    // Détruire le cookie de session si il existe
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time()-42000, '/');
    }
    
    session_unset();     // Supprime toutes les variables de session
    session_destroy();   // Détruit la session
    session_write_close(); // Ferme la session
    
    // Redirection immédiate vers la page de connexion avec un paramètre nocache
    header("Location: ../seconnecter.php?nocache=" . time());
    exit();
} else {
    // Si l'utilisateur n'est pas connecté, rediriger directement
    header("Location: ../seconnecter.php?nocache=" . time());
    exit();
}
?>
