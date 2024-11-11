<?php
 // Inclusion de la connexion à la base de données
 include ("../../../include_bdd/connexion.bdd.php");

 // Vérifie si la connexion est bien établie
 if ($connexion->connect_error) {
     die("Connexion à la base de données échouée : " . $connexion->connect_error);
 }

// Récupérer les données du formulaire
$nom_utilisateur = $_POST['nom_utilisateur'];
$mot_de_passe_saisi = $_POST['mot_de_passe'];

// Requête SQL pour récupérer le mot de passe chiffré
$sql = "SELECT mots_de_passe FROM client_inscrit WHERE nom_utilisateur = ?";
$stmt = $connexion->prepare($sql);
$stmt->bind_param("s", $nom_utilisateur);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($mot_de_passe_crypte);
    $stmt->fetch();

    // Séparer le mot de passe chiffré et l'IV
    list($encrypted_password, $stored_iv) = explode('::', base64_decode($mot_de_passe_crypte), 2);

    // Vérifier la longueur de l'IV
    $iv = base64_decode($stored_iv);
    if (strlen($iv) !== openssl_cipher_iv_length('aes-256-cbc')) {
        die("Erreur : Le vecteur d'initialisation (IV) n'a pas la bonne longueur.");
    }

    // Déchiffrer le mot de passe
    $key = 'azerty56'; // La même clé utilisée pour le chiffrement
    $dechiffre_motdepasse = openssl_decrypt($encrypted_password, 'aes-256-cbc', $key, 0, $iv);

    // Vérification si le déchiffrement a réussi
    if ($dechiffre_motdepasse === false) {
        die("Erreur lors du déchiffrement du mot de passe.");
    }

    // Comparer le mot de passe déchiffré avec celui fourni par l'utilisateur
    if ($dechiffre_motdepasse === $mot_de_passe_saisi) {
        session_start(); // Démarrer la session
        $_SESSION['nom_utilisateur'] = $nom_utilisateur; // Enregistrer le nom d'utilisateur dans la session
        $_SESSION['last_activity'] = time(); // Stocker le timestamp de la dernière activité
    
        // Définir un cookie pour mémoriser l'utilisateur
        setcookie('nom_utilisateur', $nom_utilisateur, time() + (86400 * 30), "/"); // 86400 = 1 jour
    
        echo "<br><br><h1 align='center'>Connexion réussie! </h1>";
        header("refresh:1; url=../../voitures/1-0-voitures.php");
    }  else {
        // Identifiant ou mot de passe incorrect
        echo "<br><br><h1 align='center'>Identifiant ou mot de passe incorrect</h1>";
        // Rediriger vers la page de demande d'essai après 1 seconde
        header("refresh:1; url=../seconnecter.php");
    }
} else {
    // Nom d'utilisateur non trouvé
    echo "<br><br><h1 align='center'>Identifiant incorrect</h1>";
    header("refresh:1; url=../seconnecter.php");
}

// Fermer la connexion à la base de données
$stmt->close();
$connexion->close();
?>
