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

// Insertion d'une information
if(isset($_POST['insert'])) {
    $nom_marque = $_POST['nom_marque'];
    $description_marque = $_POST['description_marque'];
    
    $sql = "INSERT INTO marque (nom_marque, description_marque) VALUES ('$nom_marque', '$description_marque')";
    
    if (mysqli_query($conn, $sql)) {
        echo "Information insérée avec succès";
        // Rediriger vers la page index après l'insertion
        header("Location: espace-ajouter-voiture.php");
        exit(); // Arrêter l'exécution du script après la redirection
    } else {
        echo "Erreur lors de l'insertion de l'information: " . mysqli_error($conn);
    }
}

// Mise à jour d'une information
if(isset($_POST['update'])) {
    $nom_marque = $_POST['nom_marque'];
    $description_marque = $_POST['description_marque'];
    
    $sql = "UPDATE marque SET description_marque='$description_marque' WHERE nom_marque='$nom_marque'";
    
    if (mysqli_query($conn, $sql)) {
        echo "information mis à jour avec succès";
        // Rediriger vers la page index après la l'update
        header("Location: espace-ajouter-voiture.php");
        exit(); // Arrêter l'exécution du script après la redirection
    } else {
        echo "Erreur lors de la mise à jour de l'information: " . mysqli_error($conn);
    }
}

// Suppression d'une information
if(isset($_POST['delete'])) {
    $description_marque = $_POST['description_marque'];
    
    $sql = "DELETE FROM marque WHERE description_marque='$description_marque'";
    
    if (mysqli_query($conn, $sql)) {
        echo "Information supprimée avec succès";
        // Rediriger vers la page index après la suppression
        header("Location: espace-ajouter-voiture.php");
        exit(); // Arrêter l'exécution du script après la redirection
    } else {
        echo "Erreur lors de la suppression de l'information: " . mysqli_error($conn);
    }
}

?>