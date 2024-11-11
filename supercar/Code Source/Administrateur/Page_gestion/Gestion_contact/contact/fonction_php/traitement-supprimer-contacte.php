<?php

// mettre en ligne la connexion avec la base de données
include ("../../../../include_bdd/connexion.bdd.php");


// Requête SQL pour récupérer DEMANDE ESSAI
$sql = "SELECT * FROM `contact`";
$resultat = $connexion->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'ID de la demande d'essai à supprimer
    $id_contact = $_POST['id_contact'];

    // Requête SQL pour supprimer la demande d'essai
    $sql = "DELETE FROM `contact` WHERE `id_contact` = $id_contact";

    // Exécuter la requête
    if ($connexion->query($sql) === TRUE) {
        echo "Contact supprimé avec succès.";
        header("Location: ../voir_contactes.php");

    } else {
        echo "Erreur: " . $sql . "<br>" . $connexion->error;
    }
}
?>
