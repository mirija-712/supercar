<?php
session_start();
// mettre en ligne la connexion avec la base de données
include("../../../include_bdd/connexion.bdd.php");

// Activer l'affichage des erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Vérifier si la connexion est établie
if ($connexion->connect_error) {
    $_SESSION['message_erreur'] = "Erreur de connexion à la base de données : " . $connexion->connect_error;
    header("Location: ../demande_essai.php");
    exit();
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Récupérer les données du formulaire
        $date_demande = $_POST["date_demande"];
        $nom_utilisateur = $_POST["nom_utilisateur"];
        $nom_modele = $_POST["nom_modele"];
        $heure_arriver = $_POST["heure_arriver"];

        // Vérifier si l'utilisateur existe
        $verifier_utilisateur = "SELECT * FROM client_inscrit WHERE nom_utilisateur = ?";
        $stmt = $connexion->prepare($verifier_utilisateur);
        $stmt->bind_param("s", $nom_utilisateur);
        $stmt->execute();
        $resultat = $stmt->get_result();

        if ($resultat->num_rows > 0) {
            // Vérifier d'abord si l'utilisateur a déjà une demande en attente pour ce modèle
            $verifier_demande = "SELECT COUNT(*) as nb_demandes FROM demande_essai 
                               WHERE nom_utilisateur = ? 
                               AND nom_modele = ? 
                               AND (etat = 'en attente' OR etat = 'confirmé')";
            $stmt = $connexion->prepare($verifier_demande);
            $stmt->bind_param("ss", $nom_utilisateur, $nom_modele);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            
            if ($row['nb_demandes'] > 0) {
                $_SESSION['message_erreur'] = "Vous avez déjà une demande en attente ou confirmée pour ce modèle. Veuillez attendre la réponse à votre première demande.";
            } else {
                // Vérification de la disponibilité
                $verifier_disponibilite = "SELECT COUNT(*) as nb_demandes 
                                          FROM demande_essai 
                                          WHERE nom_modele = ? 
                                          AND date_demande = ? 
                                          AND heure_arriver = ? 
                                          AND (etat = 'en attente' OR etat = 'confirmé')";
                $stmt = $connexion->prepare($verifier_disponibilite);
                $stmt->bind_param("sss", $nom_modele, $date_demande, $heure_arriver);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                
                if ($row['nb_demandes'] > 0) {
                    $_SESSION['message_erreur'] = "Désolé, la voiture n'est pas disponible à cette date et heure. Une autre demande est déjà en attente ou confirmée.";
                    header("Location: ../demande_essai.php");
                    exit();
                }

                // Si disponible, on peut insérer la demande
                $sql = "INSERT INTO demande_essai (date_demande, nom_utilisateur, nom_modele, heure_arriver, etat) 
                        VALUES (?, ?, ?, ?, 'en attente')";
                $stmt = $connexion->prepare($sql);
                
                if ($stmt === false) {
                    throw new Exception("Erreur de préparation : " . $connexion->error);
                }
                
                $stmt->bind_param("ssss", $date_demande, $nom_utilisateur, $nom_modele, $heure_arriver);
                
                if ($stmt->execute()) {
                    $_SESSION['message_success'] = "Votre demande d'essai a été enregistrée avec succès !";
                } else {
                    throw new Exception("Erreur lors de l'insertion : " . $stmt->error);
                }
            }
        } else {
            $_SESSION['message_erreur'] = "Le nom d'utilisateur n'existe pas. La demande n'est pas prise en compte.";
        }
    } catch (Exception $e) {
        $_SESSION['message_erreur'] = "Une erreur est survenue : " . $e->getMessage();
    }
} else {
    $_SESSION['message_erreur'] = "Le formulaire n'a pas été soumis correctement.";
}

// Redirection vers la page de demande d'essai
header("Location: ../demande_essai.php");
exit();
?> 