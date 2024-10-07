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

// Requête SQL pour récupérer DEMANDE ESSAI
$sql = "SELECT * FROM `demande_essai`";
$resultat = $connexion->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'ID de la demande d'essai à supprimer
    $id_demande_essai = $_POST['id_demande_essai'];

    // Requête SQL pour supprimer la demande d'essai
    $sql = "DELETE FROM `demande_essai` WHERE `id_demande_essai` = $id_demande_essai";

    // Exécuter la requête
    if ($connexion->query($sql) === TRUE) {
        echo "Demande d'essai supprimée avec succès.";
        header("Location: voir_demande.php");
    } else {
        echo "Erreur: " . $sql . "<br>" . $connexion->error;
    }
}
?>
