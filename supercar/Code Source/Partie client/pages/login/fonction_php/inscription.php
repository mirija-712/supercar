<?php
// Inclusion de la connexion à la base de données
include ("../../../include_bdd/connexion.bdd.php");

// Vérifie si la connexion est bien établie
if ($connexion->connect_error) {
    die("Connexion à la base de données échouée : " . $connexion->connect_error);
}

// Vérifier si la table client_inscrit existe
$check_table = "SHOW TABLES LIKE 'client_inscrit'";
$result = $connexion->query($check_table);
if ($result->num_rows == 0) {
    die("La table client_inscrit n'existe pas");
}

// Changer le jeu de caractères à utf8
mysqli_set_charset($connexion, "utf8");

// Récupérer les contenus des variables formulaires
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$nom_utilisateur = $_POST["nom_utilisateur"];
$e_mail = $_POST["e_mail"];
$mot_de_passe = $_POST["mot_de_passe"];
$confirmation_mots_de_passe = $_POST["confirmation_mots_de_passe"];

// Vérifier si les champs ne sont pas vides
if (empty($nom) || empty($prenom) || empty($nom_utilisateur) || empty($e_mail) || empty($mot_de_passe) || empty($confirmation_mots_de_passe)) {
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Erreur d\'inscription</title>
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
            <h2>Erreur d\'inscription</h2>
            <p>Veuillez remplir tous les champs du formulaire.</p>
        </div>
    </body>
    </html>';
    header("refresh:1; url=../inscription_main.php");
    exit();
}

// Vérifier si les mots de passe correspondent
if ($mot_de_passe !== $confirmation_mots_de_passe) {
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Erreur d\'inscription</title>
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
            <h2>Erreur d\'inscription</h2>
            <p>Les mots de passe ne correspondent pas.</p>
        </div>
    </body>
    </html>';
    header("refresh:1; url=../inscription_main.php");
    exit();
}

// Définir une clé de chiffrement
$key = 'azerty56'; 

// Générer un vecteur d'initialisation (IV)
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc')); 

// Chiffrement du mot de passe
$mot_de_passe_crypte = openssl_encrypt($mot_de_passe, 'aes-256-cbc', $key, 0, $iv); 

// Stocker le mot de passe chiffré et l'IV ensemble
$mot_de_passe_crypte = base64_encode($mot_de_passe_crypte . '::' . base64_encode($iv)); 

// Vérifier si le nom d'utilisateur existe déjà
$stmt = $connexion->prepare("SELECT nom_utilisateur FROM client_inscrit WHERE nom_utilisateur = ?");
if ($stmt === false) {
    die("Erreur de préparation de la requête : " . $connexion->error);
}

$stmt->bind_param("s", $nom_utilisateur);
if (!$stmt->execute()) {
    die("Erreur d'exécution de la requête : " . $stmt->error);
}

$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Erreur d\'inscription</title>
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
            <h2>Erreur d\'inscription</h2>
            <p>Le nom d\'utilisateur "' . htmlspecialchars($nom_utilisateur) . '" existe déjà. Veuillez en choisir un autre.</p>
        </div>
    </body>
    </html>';
    header("refresh:1; url=../inscription_main.php");
    exit();
}

// Préparer votre requête pour insérer des données dans la table CLIENT_INSCRIT
$inserer = $connexion->prepare("INSERT INTO client_inscrit (nom, prenom, nom_utilisateur, e_mail, mots_de_passe, date_client) VALUES (?, ?, ?, ?, ?, NOW())");
if ($inserer === false) {
    die("Erreur de préparation de l'insertion : " . $connexion->error);
}

$inserer->bind_param("sssss", $nom, $prenom, $nom_utilisateur, $e_mail, $mot_de_passe_crypte);

// Exécuter la requête
if ($inserer->execute()) {
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Inscription</title>
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
                color: #28a745;
            }
        </style>
    </head>
    <body>
        <div class="message">
            <h2>Inscription réussie !</h2>
        </div>
    </body>
    </html>';
    header("refresh:1; url=../seconnecter.php");
} else {
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Erreur d\'inscription</title>
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
            <h2>Erreur d\'inscription</h2>
            <p>Une erreur est survenue lors de l\'inscription. Veuillez réessayer.</p>
        </div>
    </body>
    </html>';
    header("refresh:1; url=../inscription_main.php");
    exit();
}

// Fermeture de la connexion avec la base de données
$stmt->close();
$inserer->close();
mysqli_close($connexion);
?>
