<?php
//Informations dans PHPmyAdmin
$serveur = "localhost"; // ou "127.0.0.1"
$utilisateur = "root";
$mot_de_passe = "";
$nom_bdd = "supercar";

// Connexion à la base de données
$conn = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $nom_bdd);

// Vérification de la connexion
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Chemin où vous stockez les images sur votre serveur
    $chemin_images = "image-voiture/image-test/";


// Insertion d'une information
if(isset($_POST['insert'])) {
    $nom_modele = $_POST['nom_modele'];
    $id_marque = $_POST['id_marque'];

    
    $sql = "INSERT INTO modele (nom_modele, id_marque) VALUES ('$nom_modele', '$id_marque')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Information insérée avec succès";
        // Rediriger vers la page index après l'insertion
        header("Location: ../Page/choix_modification_modele/crud/ajouter_modele_voiture.php");
        exit(); // Arrêter l'exécution du script après la redirection
    } else {
        echo "Erreur lors de l'insertion de l'information: " . mysqli_error($conn);
    }
}

// Modification d'une information
if(isset($_POST['update'])){
    $nom_modele = $_POST['nom_modele'];
    $id_modele = $_POST ['id_modele'];

    $sql = " UPDATE modele SET nom_modele='$nom_modele' WHERE id_modele='$id_modele'  ";

    if(mysqli_query($conn, $sql)){
        echo "Information changé avec succès";
        //Rediriger vers la page index apres l'insertion
        header("Location: ../Page/choix_modification_modele/crud/modifier_modele_voiture.php");
        exit(); // Arrêter l'execution du script
    } else {
        echo("Erreur de la modification : " . mysqli_error($conn));
    }
}

// Supprimer une information
if(isset($_POST['delete'])){
    $id_modele = $_POST['id_modele'];

    $sql = " DELETE FROM modele WHERE id_modele='$id_modele' ";

    if(mysqli_query($conn, $sql)){
        echo "Information supprimé avec succès";
        //Rediriger vers la page index apres l'insertion
        header("Location: ../Page/choix_modification_modele/crud/supprimer_modele_voiture.php");
        exit(); // Arrêter l'execution du script
    } else {
        echo("Erreur de la modification : " . mysqli_error($conn));
    }
}


?>
