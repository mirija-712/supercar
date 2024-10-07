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
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$nom_utilisateur = $_POST['nom_utilisateur'];
$email = $_POST['email'];
$mots_de_passe = $_POST['mots_de_passe'];
$confirmation_mots_de_passe = $_POST['confirmation_mots_de_passe'];

// Requête SQL pour insérer les données dans la table "client_inscrit"
$sql = "INSERT INTO client_inscrit (nom, prenom, nom_utilisateur, e_mail, mots_de_passe, confirmation_mots_de_passe, date_client) 
        VALUES ('$nom', '$prenom', '$nom_utilisateur', '$email', '$mots_de_passe', '$confirmation_mots_de_passe', NOW())";

// Exécuter la requête
if ($connexion->query($sql) === TRUE) {
    echo "Nouveau client ajouté avec succès.";
    header("Location: voir_clients.php");
} else {
    echo "Erreur: " . $sql . "<br>" . $connexion->error;
}

// Fermer la connexion à la base de données
$connexion->close();
?>
