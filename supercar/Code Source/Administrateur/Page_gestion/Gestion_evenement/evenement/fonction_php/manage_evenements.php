<?php
// mettre en ligne la connexion avec la base de données
include ("../../../../include_bdd/connexion.bdd.php");

$chemin_image = "../../../../images/evenements/";

// Créer le dossier s'il n'existe pas
if (!file_exists($chemin_image)) {
    mkdir($chemin_image, 0777, true);
}

// Insertion d'une information
if(isset($_POST['insert'])) {
    $titre = mysqli_real_escape_string($connexion, $_POST['titre']);
    $date_evenement = mysqli_real_escape_string($connexion, $_POST['date_evenement']);
    $heure = mysqli_real_escape_string($connexion, $_POST['heure']);
    $lieu = mysqli_real_escape_string($connexion, $_POST['lieu']);
    $type_voiture = mysqli_real_escape_string($connexion, $_POST['type_voiture']);
    $description = mysqli_real_escape_string($connexion, $_POST['description']);
    
    // Gestion de l'upload de l'image
    $photo = "";
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo_file = $_FILES['photo'];
        $photo_name = time() . '_' . $photo_file['name'];
        $photo_tmp = $photo_file['tmp_name'];
        $photo_destination = $chemin_image . $photo_name;
        
        if(move_uploaded_file($photo_tmp, $photo_destination)) {
            $photo = $photo_destination;
        }
    }
    
    $sql = "INSERT INTO evenements (titre, date_evenement, heure, lieu, type_voiture, description, photo) 
    VALUES ('$titre', '$date_evenement', '$heure', '$lieu', '$type_voiture', '$description', '$photo')";
    
    if (mysqli_query($connexion, $sql)) {
        header("Location: ../evenement_supercar.php");
        exit();
    } else {
        echo "Erreur lors de l'insertion de l'information: " . mysqli_error($connexion);
    }
}

// Mise à jour d'une information
if(isset($_POST['update'])) {
    $titre = mysqli_real_escape_string($connexion, $_POST['titre']);
    $date_evenement = mysqli_real_escape_string($connexion, $_POST['date_evenement']);
    $heure = mysqli_real_escape_string($connexion, $_POST['heure']);
    $lieu = mysqli_real_escape_string($connexion, $_POST['lieu']);
    $type_voiture = mysqli_real_escape_string($connexion, $_POST['type_voiture']);
    $description = mysqli_real_escape_string($connexion, $_POST['description']);
    $id_evenement = mysqli_real_escape_string($connexion, $_POST['id_evenement']);
    
    // Gestion de la photo
    $photo_update = "";
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $photo = $_FILES['photo'];
        $photo_name = time() . '_' . $photo['name'];
        $photo_tmp = $photo['tmp_name'];
        $photo_destination = $chemin_image . $photo_name;
        
        if(move_uploaded_file($photo_tmp, $photo_destination)) {
            $photo_update = ", photo='" . $photo_destination . "'";
        }
    }
    
    $sql = "UPDATE evenements 
    SET titre='$titre', 
        date_evenement='$date_evenement', 
        heure='$heure', 
        lieu='$lieu', 
        type_voiture='$type_voiture', 
        description='$description' 
        $photo_update
    WHERE id_evenement='$id_evenement'";
    
    if (mysqli_query($connexion, $sql)) {
        header("Location: ../evenement_supercar.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour de l'information: " . mysqli_error($connexion);
    }
}

// Suppression d'une information
if(isset($_POST['delete'])) {
    $id_evenement = mysqli_real_escape_string($connexion, $_POST['id_evenement']);
    
    // Récupérer le chemin de la photo avant la suppression
    $sql_photo = "SELECT photo FROM evenements WHERE id_evenement='$id_evenement'";
    $result = mysqli_query($connexion, $sql_photo);
    if($row = mysqli_fetch_assoc($result)) {
        $photo_path = $row['photo'];
        // Supprimer le fichier photo s'il existe
        if(file_exists($photo_path)) {
            unlink($photo_path);
        }
    }
    
    $sql = "DELETE FROM evenements WHERE id_evenement='$id_evenement'";
    
    if (mysqli_query($connexion, $sql)) {
        header("Location: ../evenement_supercar.php");
        exit();
    } else {
        echo "Erreur lors de la suppression de l'information: " . mysqli_error($connexion);
    }
}
?>
