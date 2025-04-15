<?php
// Démarrer la session
session_start();
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
    
    // Afficher le message de déconnexion en cours
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Déconnexion en cours</title>
        <style>
            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                background-color: #f8f9fa;
                font-family: Arial, sans-serif;
            }
            .message {
                text-align: center;
                padding: 20px;
                background-color: white;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            }
        </style>
    </head>
    <body>
        <div class="message">
            <h2>Déconnexion en cours...</h2>
        </div>
    </body>
    </html>';
    
    // Détruire la session
    session_destroy();
    
    // Redirection vers la page de connexion après 1 seconde
    header("refresh:1; url=../seconnecter.php");
    exit();
} else {
    // Si l'utilisateur n'est pas connecté, rediriger directement
    header("Location: ../seconnecter.php");
    exit();
}
?>
