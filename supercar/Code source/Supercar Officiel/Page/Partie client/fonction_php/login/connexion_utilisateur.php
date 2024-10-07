<?php
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

// Récupérer les données du formulaire
$nom_utilisateur = $_POST['nom_utilisateur'];
$mot_de_passe = $_POST['mot_de_passe'];

// Requête SQL pour vérifier les informations de connexion
$sql = "SELECT * FROM client_inscrit WHERE nom_utilisateur = '$nom_utilisateur' AND mots_de_passe = '$mot_de_passe'";

$resultat = $connexion->query($sql);

if ($resultat->num_rows > 0) {
    // L'utilisateur est connecté avec succès
    session_start(); // Démarrer la session
    $_SESSION['nom_utilisateur'] = $nom_utilisateur; // Enregistrer le nom d'utilisateur dans la session
    echo "Connexion réussie! ";
    // Rediriger vers la page de demande d'essai après 3 secondes
    header("refresh:2; url=../voitures/2-0-voitures.php");
} else {
    // Identifiant ou mot de passe incorrect
    echo "Identifiant ou mot de passe incorrect";
}

// Fermer la connexion à la base de données
$connexion->close();
?>
