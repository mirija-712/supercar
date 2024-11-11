<?php
// mettre en ligne la connexion avec la base de données
include ("../../../../include_bdd/connexion.bdd.php");


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
        header("Location: ../voir_demande.php");
    } else {
        echo "Erreur: " . $sql . "<br>" . $connexion->error;
    }
}
?>
