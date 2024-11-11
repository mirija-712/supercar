<?php
// mettre en ligne la connexion avec la base de données
include ("../../../../include_bdd/connexion.bdd.php");

// Insertion d'une information
if(isset($_POST['insert'])) {
    $nom_marque = $_POST['nom_marque'];
    $description_marque = $_POST['description_marque'];
    
    $sql = "INSERT INTO marque (nom_marque, description_marque) VALUES ('$nom_marque', '$description_marque')";
    
    if (mysqli_query($connexion, $sql)) {
        echo "Information insérée avec succès";
        // Rediriger vers la page index après l'insertion
        header("Location: espace-ajouter-voiture.php");
        exit(); // Arrêter l'exécution du script après la redirection
    } else {
        echo "Erreur lors de l'insertion de l'information: " . mysqli_error($connexion);
    }
}

?>
