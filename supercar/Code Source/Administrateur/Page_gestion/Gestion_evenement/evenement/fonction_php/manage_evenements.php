<?php
// mettre en ligne la connexion avec la base de données
include ("../../../../include_bdd/connexion.bdd.php");

    $chemin_image= "images/";

// Insertion d'une information
if(isset($_POST['insert'])) {
    $titre = $_POST['titre'];
    $date_evenement = $_POST['date_evenement'];
    $heure = $_POST['heure'];
    $lieu = $_POST['lieu'];
    $type_voiture = $_POST['type_voiture'];
    $description = $_POST['description'];
    $photo = $chemin_image . $_POST['photo'];

    
    $sql = "INSERT INTO evenements (titre, date_evenement, heure, lieu, type_voiture, description, photo) 
    VALUES ('$titre', '$date_evenement', '$heure', '$lieu', '$type_voiture', '$description', '$photo')";
    
    if (mysqli_query($connexion, $sql)) {
        echo "Information insérée avec succès";
        // Rediriger vers la page index après l'insertion
        header("Location: ../evenement_supercar.php");
        exit(); // Arrêter l'exécution du script après la redirection
    } else {
        echo "Erreur lors de l'insertion de l'information: " . mysqli_error($connexion);
    }
}

// Mise à jour d'une information
if(isset($_POST['update'])) {
    $titre = $_POST['titre'];
    $date_evenement = $_POST['date_evenement'];
    $heure = $_POST['heure'];
    $lieu = $_POST['lieu'];
    $type_voiture = $_POST['type_voiture'];
    $description = $_POST['description'];
    $photo = $chemin_image . $_POST['photo'];
    $id_evenement = $_POST['id_evenement'];
    
    $sql = "UPDATE evenements 
    SET titre='$titre' , date_evenement='$date_evenement' ,heure='$heure' ,lieu='$lieu' ,type_voiture='$type_voiture' ,description='$description', photo='$photo'
    WHERE id_evenement='$id_evenement'";
    
    if (mysqli_query($connexion, $sql)) {
        echo "information mis à jour avec succès";
        // Rediriger vers la page index après la l'update
        header("Location: ../evenement_supercar.php");
        exit(); // Arrêter l'exécution du script après la redirection
    } else {
        echo "Erreur lors de la mise à jour de l'information: " . mysqli_error($connexion);
    }
}

// Suppression d'une information
if(isset($_POST['delete'])) {
    $id_evenement = $_POST['id_evenement'];
    
    $sql = "DELETE FROM evenements WHERE id_evenement='$id_evenement'";
    
    if (mysqli_query($connexion, $sql)) {
        echo "Information supprimée avec succès";
        // Rediriger vers la page index après la suppression
        header("Location: ../evenement_supercar.php");
        exit(); // Arrêter l'exécution du script après la redirection
    } else {
        echo "Erreur lors de la suppression de l'information: " . mysqli_error($connexion);
    }
}

?>
