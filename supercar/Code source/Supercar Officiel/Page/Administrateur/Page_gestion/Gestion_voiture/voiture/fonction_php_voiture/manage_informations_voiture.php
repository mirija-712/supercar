<?php
//Informations dans PHPmyAdmin
$serveur = "localhost"; 
$utilisateur = "root";
$mot_de_passe = "";
$nom_bdd = "supercar";

// Connexion à la base de données
$conn = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $nom_bdd);

// Vérification de la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Insertion d'une information
if(isset($_POST['insert'])) {
    $nom_modele = $_POST['nom_modele'];
    $id_modele = $_POST['id_modele'];
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


    
    $sql = "INSERT INTO voitures (nom_modele, id_modele, marque, annee, transmission, sieges, prix, vitesse_max, moteur, consommation, puissance, description, photo_1, photo_2 , photo_3, photo_4) 
    VALUES ('$nom_modele', '$id_modele','$marque', '$annee', '$transmission', '$sieges', '$prix', '$vitesse_max',  '$moteur', '$consommation', '$puissance', '$description' , '$photo_1', '$photo_2', '$photo_3', '$photo_4')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Information insérée avec succès";
        // Rediriger vers la page index après l'insertion
        header("Location: ../Page/modification_img_prix/crud/ajouter_voiture.php");
        exit(); // Arrêter l'exécution du script après la redirection
    } else {
        echo "Erreur lors de l'insertion de l'information: " . mysqli_error($conn);
    }
}


// Mise à jour d'une information
if(isset($_POST['update_img'])) {
    $nom_modele = $_POST['nom_modele'];
    $id_modele = $_POST['id_modele'];
    $photo_1 = $_POST['photo_1'];
    $photo_2 = $_POST['photo_2'];
    $photo_3 = $_POST['photo_3'];
    $photo_4 = $_POST['photo_4'];

    $sql = "UPDATE voitures SET photo_1='$photo_1', photo_2='$photo_2', photo_3='$photo_3', photo_4='$photo_4'
    WHERE id_modele='$id_modele' AND nom_modele='$nom_modele'";
    
    if (mysqli_query($conn, $sql)) {
        echo "Information mise à jour avec succès";
        // Redirection vers la page index après la mise à jour
        header("Location: ../Page/modification_img_prix/crud/modifier_img_voiture.php");
        exit(); // Arrêter l'exécution du script après la redirection
    } else {
        echo "Erreur lors de la mise à jour de l'information: " . mysqli_error($conn);
    }
}

if(isset($_POST['update_prix'])) {
    $nom_modele = $_POST['nom_modele'];
    $nouveau_prix = $_POST['prix'];

    // Récupérer le prix actuel du modèle de voiture
    $sql = "SELECT prix FROM voitures WHERE nom_modele='$nom_modele'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $prix_actuel = $row['prix'];

    // Vérifier si le nouveau prix dépasse 15% du prix actuel
    $difference = $nouveau_prix - $prix_actuel;
    $pourcentage_augmentation = ($difference / $prix_actuel) * 100;

    // Initialisation de la variable pour savoir si on doit afficher un pop-up
    $afficher_popup = false;

    if ($pourcentage_augmentation > 25) {
        // Activer le flag pour afficher le pop-up
        $afficher_popup = true;
    }

    // Vérification pour empêcher les réductions de prix
    if ($nouveau_prix < $prix_actuel) {
        echo "<script>alert('Les réductions de prix ne sont pas autorisées.');
                    setTimeout(function() {
                        window.location.href = '../Page/modification_img_prix/crud/modifier_prix_voiture.php';
                    }, 1000); // Redirection après 1 seconde</script>";
    } else {
        // Mise à jour du prix dans la base de données
        $sql_update = "UPDATE voitures SET prix='$nouveau_prix' WHERE nom_modele='$nom_modele'";
        if (mysqli_query($conn, $sql_update)) {
            // Si la mise à jour est réussie et que le pop-up doit être affiché
            if ($afficher_popup) {
                echo "<script>
                    alert('Attention : La modification du prix dépasse 25%.');
                    setTimeout(function() {
                        window.location.href = '../Page/modification_img_prix/crud/modifier_prix_voiture.php';
                    }, 1000); // Redirection après 1 seconde
                </script>";
            } else {
                // Si pas de pop-up, redirection immédiate
                echo "<script>
                    window.location.href = '../Page/modification_img_prix/crud/modifier_prix_voiture.php';
                </script>";
            }
        } else {
            echo "Erreur lors de la mise à jour de l'information: " . mysqli_error($conn);
        }
    }
}



// Suppression d'une information
if(isset($_POST['delete'])) {
    $id_modele = $_POST['id_modele'];

    $sql = "DELETE FROM voitures WHERE id_modele='$id_modele'";
    
    if (mysqli_query($conn, $sql)) {
        echo "Information supprimée avec succès";
        // Redirection vers la page index après la suppression
        header("Location: ../Page/modification_img_prix/crud/supprimer_voiture.php");
        exit(); // Arrêter l'exécution du script après la redirection
    } else {
        echo "Erreur lors de la suppression de l'information: " . mysqli_error($conn);
    }
}




?>
