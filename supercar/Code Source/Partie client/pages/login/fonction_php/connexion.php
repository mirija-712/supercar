<?php
session_start();
include("../../../include_bdd/connexion.bdd.php");

// Vérifier la connexion à la base de données
if ($connexion->connect_error) {
    die("Erreur de connexion à la base de données : " . $connexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $mots_de_passe = $_POST['mot_de_passe'];

    // Vérifier si la table client_inscrit existe
    $check_table = "SHOW TABLES LIKE 'client_inscrit'";
    $result = $connexion->query($check_table);
    if ($result->num_rows == 0) {
        die("La table client_inscrit n'existe pas");
    }

    $sql = "SELECT * FROM client_inscrit WHERE nom_utilisateur = ?";
    $stmt = $connexion->prepare($sql);
    if ($stmt === false) {
        die("Erreur de préparation de la requête client : " . $connexion->error);
    }
    
    $stmt->bind_param("s", $nom_utilisateur);
    if (!$stmt->execute()) {
        die("Erreur d'exécution de la requête client : " . $stmt->error);
    }
    
    $resultat = $stmt->get_result();

    if ($resultat->num_rows > 0) {
        $row = $resultat->fetch_assoc();
        
        // Déchiffrer le mot de passe stocké
        $key = 'azerty56';
        $mot_de_passe_crypte = $row['mots_de_passe'];
        
        // Décoder le mot de passe chiffré
        $decoded = base64_decode($mot_de_passe_crypte);
        list($encrypted_data, $iv) = explode('::', $decoded, 2);
        $iv = base64_decode($iv);
        
        // Déchiffrer le mot de passe
        $mot_de_passe_dechiffre = openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
        
        if ($mot_de_passe_dechiffre === $mots_de_passe) {
            $_SESSION['nom_utilisateur'] = $nom_utilisateur;
            $_SESSION['nom'] = $row['nom'];
            $_SESSION['prenom'] = $row['prenom'];
            
            // Vérifier si la table historique_connexion existe
            $check_historique = "SHOW TABLES LIKE 'historique_connexion'";
            $result_hist = $connexion->query($check_historique);
            if ($result_hist->num_rows == 0) {
                die("La table historique_connexion n'existe pas");
            }
            
            // Enregistrer la connexion dans l'historique
            $sql_historique = "INSERT INTO historique_connexion (nom_utilisateur, type_action) VALUES (?, 'connexion')";
            $stmt_historique = $connexion->prepare($sql_historique);
            if ($stmt_historique === false) {
                die("Erreur de préparation historique : " . $connexion->error);
            }
            
            $stmt_historique->bind_param("s", $nom_utilisateur);
            if (!$stmt_historique->execute()) {
                die("Erreur d'exécution historique : " . $stmt_historique->error);
            }
            
            // Afficher le message de connexion en cours
            echo '<!DOCTYPE html>
            <html>
            <head>
                <title>Connexion en cours</title>
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
                    <h2>Connexion en cours...</h2>
                </div>
            </body>
            </html>';
            
            // Redirection vers la page des voitures après 1 seconde
            header("refresh:1; url=../../voitures/1-0-voitures.php");
            exit();
        } else {
            echo '<!DOCTYPE html>
            <html>
            <head>
                <title>Erreur de connexion</title>
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
                        color: #dc3545;
                    }
                </style>
            </head>
            <body>
                <div class="message">
                    <h2>Mot de passe incorrect</h2>
                </div>
            </body>
            </html>';
            header("refresh:1; url=../seconnecter.php");
            exit();
        }
    } else {
        echo '<!DOCTYPE html>
        <html>
        <head>
            <title>Erreur de connexion</title>
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
                    color: #dc3545;
                }
            </style>
        </head>
        <body>
            <div class="message">
                <h2>Nom d\'utilisateur incorrect</h2>
            </div>
        </body>
        </html>';
        header("refresh:1; url=../seconnecter.php");
        exit();
    }
}
?>
