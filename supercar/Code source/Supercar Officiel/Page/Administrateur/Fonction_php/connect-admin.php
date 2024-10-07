<?php
session_start();

// Informations de connexion à la base de données
$serveur = "localhost"; // ou "127.0.0.1"
$utilisateur = "root";
$mot_de_passe = "";
$nom_bdd = "supercar";

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_bdd);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Connexion échouée: " . $connexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $identifiant = $_POST["identifiant"];
    $mot_de_passe = $_POST["mot_de_passe"];

    // Requête SQL pour vérifier les identifiants
    $sql = "SELECT * FROM `admin` WHERE `identifiant`='$identifiant' AND `mot_de_passe`='$mot_de_passe'";
    $resultat = $connexion->query($sql);

    if ($resultat->num_rows == 1) {
        // L'administrateur est authentifié, enregistrer l'identifiant dans la session
        $_SESSION["admin"] = $identifiant;
        header("Location: ../Accueil_admin/menu-admin.php"); // Redirection vers la page suivante
        exit();
    } else {
        echo "Identifiant ou mot de passe incorrect";
    }
}
?>
