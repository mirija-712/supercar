<?php
// Connexion à la base de données
$serveur = "localhost";  // Adresse du serveur MySQL
$login = "root";  // Nom d'utilisateur MySQL
$mdp = "";  // Mot de passe MySQL
$bdd = "supercar";  // Nom de la base de données

$connexion = new mysqli($serveur, $login, $mdp, $bdd);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("La connexion à la base de données a échoué : " . $connexion->connect_error);
}

// Récupérer données formulaire (page contact)
$sexe = $_POST['sexe'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$message = $_POST['message'];

// inserction des donnee dans la page contact supercar
$insert_query = "INSERT INTO contact (sexe, nom, prenom, email, message, date_contact) VALUES ('$sexe', '$nom', '$prenom', '$email', '$message', NOW())";

// Exécuter la requête
if ($connexion->query($insert_query) === TRUE) {
    echo "Les données ont été enregistrées.";
    header("Location: contactez-nous.php");
} else {
    echo "Erreur : " . $insert_query . "<br>" . $connexion->error;
}

// Fermer la connexion bdd
$connexion->close();
?>