<?php
// mettre en ligne la connexion avec la base de données
include ("../../../../include_bdd/connexion.bdd.php");

// Vérification de la méthode de requête
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'ID de la demande d'essai à terminer
    $id_demande_essai = intval($_POST['id_demande_essai']);

    // Utilisation de requêtes préparées pour éviter les injections SQL
    $stmt = $connexion->prepare("UPDATE `demande_essai` SET `etat` = 'terminé' WHERE `id_demande_essai` = ?");
    $stmt->bind_param("i", $id_demande_essai);

    // Exécuter la requête
    if ($stmt->execute()) {
        // Redirection après mise à jour
        header("Location: ../voir_demande.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour de la demande d'essai : " . $stmt->error;
    }

    // Fermer la requête préparée
    $stmt->close();
}

// Fermer la connexion à la base de données
$connexion->close();
?>
