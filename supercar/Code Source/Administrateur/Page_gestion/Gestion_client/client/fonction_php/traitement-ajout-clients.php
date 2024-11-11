<?php
    // mettre en ligne la connexion avec la base de données
    include ("../../../../include_bdd/connexion.bdd.php");

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$nom_utilisateur = $_POST['nom_utilisateur'];
$e_mail = $_POST['e_mail'];
$mots_de_passe = $_POST['mots_de_passe'];
$confirmation_mots_de_passe = $_POST['confirmation_mots_de_passe'];

// Vérifier si les mots de passe correspondent
if ($mots_de_passe !== $confirmation_mots_de_passe) {
    die("<p>Les mots de passe ne correspondent pas.</p>");
}

// Requête SQL pour insérer les données dans la table "client_inscrit"
$sql = "INSERT INTO client_inscrit (nom, prenom, nom_utilisateur, e_mail, mots_de_passe, date_client) 
        VALUES ('$nom', '$prenom', '$nom_utilisateur', '$e_mail', '$mots_de_passe', NOW())";

// Exécuter la requête
if ($connexion->query($sql) === TRUE) {
    echo "Nouveau client ajouté avec succès.";
    header("Location: ../voir_clients.php");
} else {
    echo "Erreur: " . $sql . "<br>" . $connexion->error;
}

// Fermer la connexion à la base de données
$connexion->close();
?>
