
<?php
// mettre en ligne la connexion avec la base de données
include("../../../include_bdd/connexion.bdd.php");

// récupérer les contenus des variables formulaires
$date_demande = $_POST["date_demande"];
$nom_utilisateur = $_POST["nom_utilisateur"];
$nom_modele = $_POST["nom_modele"];
$heure_arriver = $_POST["heure_arriver"];

// Vérifier si le nom_utilisateur existe dans la base de données
$verifier_utilisateur = "SELECT * FROM client_inscrit WHERE nom_utilisateur = '$nom_utilisateur'";
$resultat = mysqli_query($connexion, $verifier_utilisateur);

if (mysqli_num_rows($resultat) > 0) {
    // Le nom_utilisateur existe, donc on peut insérer la demande
    // Préparer votre requête pour insérer des données dans la table demande_essai
    $inserer = "INSERT INTO demande_essai (date_demande, nom_utilisateur, nom_modele, heure_arriver) 
                VALUES ('$date_demande', '$nom_utilisateur', '$nom_modele', '$heure_arriver')";

    // Exécuter la requête avec la fonction PHP
    mysqli_query($connexion, $inserer);

    if (mysqli_affected_rows($connexion) > 0) {
        echo "<h2 align='center'> Merci. Vos données sont bien insérées !!! </h2>";
        header("refresh:2; url=../../pages/voitures/1-0-voitures.php");
    } else {
        echo "<p>Erreur lors de l'insertion des données.</p>";
    }
} else {
    echo "<p>Le nom d'utilisateur n'existe pas. La demande n'est pas prise en compte.</p>";
        header("refresh:2; url= ../../pages/demande_essaie/demande_essai.php");

}
// fermeture de la connexion avec la base de données
mysqli_close($connexion);
?>
