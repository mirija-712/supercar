<?php
// mettre en ligne la connexion avec la base de données
include ("../../../../include_bdd/connexion.bdd.php");

// Insertion d'une information
if(isset($_POST['insert'])) {
    $nom_modele = $_POST['nom_modele'];
    $id_marque = $_POST['id_marque'];

    
    $sql = "INSERT INTO modele (nom_modele, id_marque) VALUES ('$nom_modele', '$id_marque')";
    
    if (mysqli_query($connexion, $sql)) {
        echo "Information insérée avec succès";
        // Rediriger vers la page index après l'insertion
        header("Location: ../Page/ajout_modele/page/ajouter_modele_voiture.php");
        exit(); // Arrêter l'exécution du script après la redirection
    } else {
        echo "Erreur lors de l'insertion de l'information: " . mysqli_error($connexion);
    }
}

// Modification d'une information
if (isset($_POST['update'])) {
    $nom_modele = $_POST['nom_modele'];
    $id_modele = $_POST['id_modele'];

    // Requête SQL pour mettre à jour le modèle
    $sql1 = "UPDATE modele SET nom_modele='$nom_modele' WHERE id_modele='$id_modele'";
    
    // Requête SQL pour mettre à jour tous les véhicules avec le nouveau nom du modèle
    $sql2 = "UPDATE voitures SET nom_modele='$nom_modele' WHERE id_modele='$id_modele'";

    // Exécuter les deux requêtes
    if (mysqli_query($connexion, $sql1) && mysqli_query($connexion, $sql2)) {
        echo "Informations modifiées avec succès";
        // Rediriger vers la page index après la modification
        header("Location: ../Page/modification_modele/page/modifier_modele_voiture.php");
        exit(); // Arrêter l'exécution du script
    } else {
        echo "Erreur de la modification : " . mysqli_error($connexion);
    }
}


?>
