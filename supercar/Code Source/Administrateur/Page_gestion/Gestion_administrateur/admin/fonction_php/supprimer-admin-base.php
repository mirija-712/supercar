<?php
include ("../../../../include_bdd/connexion.bdd.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Supprimer l'administrateur
    $sql = "DELETE FROM `admin` WHERE `ID_admin` = $id";
    
    if ($connexion->query($sql) === TRUE) {
        header("Location: ../ajouter-admin.php?message=suppression_reussie");
    } else {
        header("Location: ../ajouter-admin.php?message=erreur_suppression");
    }
} else {
    header("Location: ../ajouter-admin.php");
}

$connexion->close();
?> 