<?php
include ("../../../../include_bdd/connexion.bdd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $identifiant = $_POST["identifiant"];
    $mot_de_passe = $_POST["mot_de_passe"];

    // Si le mot de passe est vide, on ne le modifie pas
    if (empty($mot_de_passe)) {
        $sql = "UPDATE `admin` SET `identifiant` = '$identifiant' WHERE `ID_admin` = $id";
    } else {
        $sql = "UPDATE `admin` SET `identifiant` = '$identifiant', `mot_de_passe` = '$mot_de_passe' WHERE `ID_admin` = $id";
    }

    if ($connexion->query($sql) === TRUE) {
        header("Location: ../ajouter-admin.php?message=modification_reussie");
    } else {
        header("Location: ../ajouter-admin.php?message=erreur_modification");
    }
} else {
    header("Location: ../ajouter-admin.php");
}

$connexion->close();
?> 