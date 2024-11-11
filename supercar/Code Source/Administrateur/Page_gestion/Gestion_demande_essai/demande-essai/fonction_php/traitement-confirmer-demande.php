<?php
// mettre en ligne la connexion avec la base de données
include ("../../../../include_bdd/connexion.bdd.php");

// Si le formulaire est soumis (pour confirmer une demande d'essai)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmer'])) {
    // Récupérer l'ID de la demande d'essai
    $id_demande_essai = intval($_POST['id_demande_essai']);
    
    // Mise à jour de l'état de la demande d'essai à "Confirmé"
    $stmt = $connexion->prepare("UPDATE `demande_essai` SET `etat` = 'Confirmé' WHERE `id_demande_essai` = ?");
    $stmt->bind_param("i", $id_demande_essai);
    
    // Exécution de la mise à jour
    if ($stmt->execute()) {
        // Redirection après confirmation
        header("Location: ../voir_demande.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour : " . $stmt->error;
    }

    // Fermer la requête préparée
    $stmt->close();
}

// Requête SQL pour récupérer toutes les demandes d'essai
$sql = "SELECT * FROM `demande_essai`";
$resultat = $connexion->query($sql);

?>