<?php
// mettre en ligne la connexion avec la base de données
include ("../../../../include_bdd/connexion.bdd.php");

if (isset($_POST['insert'])) {
    // Récupérer le nom du modèle
    $nom_modele = $_POST['nom_modele'];

    // Récupérer l'id_modele correspondant au nom_modele
    $query = "SELECT id_modele FROM modele WHERE nom_modele = '$nom_modele'";
    $result = mysqli_query($connexion, $query);
    $row = mysqli_fetch_assoc($result);
    $id_modele = $row['id_modele'];

    // Récupérer les autres valeurs
    $marque = $_POST['marque'];
    $annee = $_POST['annee'];
    $transmission = $_POST['transmission'];
    $sieges = $_POST['sieges'];
    $prix = $_POST['prix'];
    $vitesse_max = $_POST['vitesse_max'];
    $moteur = $_POST['moteur'];
    $consommation = $_POST['consommation'];
    $puissance = $_POST['puissance'];
    $description = $_POST['description'];
    $photo_1 = $_POST['photo_1'];
    $photo_2 = $_POST['photo_2'];
    $photo_3 = $_POST['photo_3'];
    $photo_4 = $_POST['photo_4'];

    // Insertion dans la base de données
    $sql = "INSERT INTO voitures (nom_modele, id_modele, marque, annee, transmission, sieges, prix, vitesse_max, moteur, consommation, puissance, description, photo_1, photo_2, photo_3, photo_4) 
    VALUES ('$nom_modele', '$id_modele', '$marque', '$annee', '$transmission', '$sieges', '$prix', '$vitesse_max', '$moteur', '$consommation', '$puissance', '$description', '$photo_1', '$photo_2', '$photo_3', '$photo_4')";
    
    if (mysqli_query($connexion, $sql)) {
        echo "Information insérée avec succès";
        header("Location: ../Page/ajout_modele/page/ajouter_desc_voiture.php");
        exit();
    } else {
        echo "Erreur lors de l'insertion de l'information: " . mysqli_error($connexion);
    }
}

if (isset($_POST['update_desc'])) {
    // Récupérer l'id_voiture
    $id_voiture = $_POST['id_voiture'];

    // Récupérer les autres valeurs
    $annee = $_POST['annee'];
    $transmission = $_POST['transmission'];
    $sieges = $_POST['sieges'];
    $vitesse_max = $_POST['vitesse_max'];
    $moteur = $_POST['moteur'];
    $consommation = $_POST['consommation'];
    $puissance = $_POST['puissance'];
    $description = $_POST['description'];

    // Préparer la requête SQL
    $sql = "UPDATE voitures 
            SET annee = ?, 
                transmission = ?, 
                sieges = ?, 
                vitesse_max = ?, 
                moteur = ?, 
                consommation = ?, 
                puissance = ?, 
                description = ? 
            WHERE id_voiture = ?";

    if ($stmt = mysqli_prepare($connexion, $sql)) {
        // Associer les paramètres
        mysqli_stmt_bind_param($stmt, "ssssssssi", $annee, $transmission, $sieges, $vitesse_max, $moteur, $consommation, $puissance, $description, $id_voiture);

        // Exécuter la requête
        if (mysqli_stmt_execute($stmt)) {
            echo "Information mise à jour avec succès";
            header("Location: ../Page/modification_modele/page/modifier_desc_voiture.php");
            exit();
        } else {
            echo "Erreur lors de la mise à jour de l'information: " . mysqli_error($connexion);
        }

        // Fermer la requête
        mysqli_stmt_close($stmt);
    } else {
        echo "Erreur de préparation de la requête: " . mysqli_error($connexion);
    }
}



if(isset($_POST['update_img'])) {
    $id_modele = mysqli_real_escape_string($connexion, $_POST['id_modele']);
    $photo_1 = mysqli_real_escape_string($connexion, $_POST['photo_1']);
    $photo_2 = mysqli_real_escape_string($connexion, $_POST['photo_2']);
    $photo_3 = mysqli_real_escape_string($connexion, $_POST['photo_3']);
    $photo_4 = mysqli_real_escape_string($connexion, $_POST['photo_4']);

    $sql = "UPDATE voitures SET 
            photo_1 = IF('$photo_1' != '', '$photo_1', photo_1), 
            photo_2 = IF('$photo_2' != '', '$photo_2', photo_2), 
            photo_3 = IF('$photo_3' != '', '$photo_3', photo_3), 
            photo_4 = IF('$photo_4' != '', '$photo_4', photo_4)
            WHERE id_modele = '$id_modele'";
    
    if (mysqli_query($connexion, $sql)) {
        echo "Information mise à jour avec succès";
        header("Location: ../Page/modification_modele/page/modifier_img_voiture.php");
        exit(); 
    } else {
        echo "Erreur lors de la mise à jour de l'information: " . mysqli_error($connexion);
    }
}


if (isset($_POST['update_prix'])) {
    $nom_modele = $_POST['nom_modele'];
    $nouveau_prix = $_POST['prix'];

    // Mise à jour du prix dans la base de données
    $sql_update = "UPDATE voitures SET prix='$nouveau_prix' WHERE nom_modele='$nom_modele'";
    if (mysqli_query($connexion, $sql_update)) {
        echo "<h1 align='center'>Le prix a été mis à jour avec succès.</h1>";
        header("refresh:2; url= ../Page/modification_modele/page/modifier_prix_voiture.php");
    } else {
        echo "Erreur lors de la mise à jour de l'information: " . mysqli_error($connexion);
    }
}


?>
