<?php
// Inclusion de la connexion à la base de données
include ("../../../include_bdd/connexion.bdd.php");

// Vérifie si la connexion est bien établie
if ($connexion->connect_error) {
    die("Connexion à la base de données échouée : " . $connexion->connect_error);
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
    echo "<br><br><h1 align='center'>Les données ont été enregistrées.</h1>";
    // Rediriger vers la page de demande d'essai après 1 seconde
    header("refresh:1; url=../contactez-nous.php");
} else {
    echo "Erreur : " . $insert_query . "<br>" . $connexion->error;
}

// Fermer la connexion bdd
$connexion->close();
?>
