<?php
// mettre en ligne la connexion avec la base de données
// nom du serveur 
$host = "localhost";
// nom utilisateur
$login = "root";
// mot de passe
$pass = "";
// nom de la base de données
$dbname = "supercar";

// établir la connexion avec la base de données
$bdd = mysqli_connect($host, $login, $pass, $dbname);

// vérification de la connexion avec la Base des Données
if (!$bdd){
    echo "Connexion non-reussie à MySQL: " . mysqli_connect_error();
} else {
    echo "Vous êtes connecté";
}

// changer le jeu de caractères à utf8
mysqli_set_charset($bdd, "utf8"); 

// récupérer les contenus des variables formulaires
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$nom_utilisateur = $_POST["nom_utilisateur"];
$e_mail = $_POST["e_mail"];
$mot_de_passe = $_POST["mot_de_passe"];
$confirmation_mots_de_passe = $_POST["confirmation_mots_de_passe"];

// Vérifier si le nom d'utilisateur existe déjà
$verification = "SELECT nom_utilisateur FROM client_inscrit WHERE nom_utilisateur = '$nom_utilisateur'";
$resultat = mysqli_query($bdd, $verification);

if (mysqli_num_rows($resultat) > 0) {
    echo "<p>Le nom d'utilisateur '$nom_utilisateur' existe déjà. Veuillez en choisir un autre.</p>";
    header("refresh:3; url=../login/inscription_main.php");
} else {
    // préparer votre requête pour insérer des données dans la table PERSONNE
    $inserer = "INSERT INTO client_inscrit (nom,prenom,nom_utilisateur,e_mail,mots_de_passe,confirmation_mots_de_passe,date_client) 
    values ('$nom', '$prenom', '$nom_utilisateur', '$e_mail', '$mot_de_passe', '$confirmation_mots_de_passe', NOW())";
    
    // exécuter la requête avec la fonction PHP
    mysqli_query($bdd, $inserer);
    
    if(mysqli_affected_rows($bdd) > 0 ){
        echo" <h2 align='center'> Merci. Vos données sont bien insérées !!! </h2>";
        header("refresh:2; url=../login/seconnecter.php");
    } else {
        echo"<p> Veuillez vérifier vos informations</p>";
    }
}

// fermeture de la connexion avec la base de données
mysqli_close($bdd);
?>
