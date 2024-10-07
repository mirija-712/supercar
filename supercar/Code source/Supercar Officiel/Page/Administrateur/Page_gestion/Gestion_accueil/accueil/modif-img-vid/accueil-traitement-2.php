<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise a Jour</title>
</head>
<body>
    <?php
        // Informations de connexion à la base de données
        $serveur = "localhost"; // ou "127.0.0.1"
        $utilisateur = "root";
        $mot_de_passe = "";
        $nom_bdd = "supercar";

        // Connexion à la base de données
        $connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_bdd);

        // Vérifier la connexion
        if ($connexion->connect_error) {
            die("Connexion échouée: " . $connexion->connect_error);
        }

        $miseAJourReussie = false; // Initialisation de la variable pour savoir si au moins une mise à jour a réussi

        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les valeurs soumises
            $ids = $_POST["id"];
            $imgs = $_POST["img"];
            $imgs2 = $_POST["img2"];
            $videos = $_POST["video"];
            
            // Parcourir les tableaux des valeurs soumises
            foreach ($ids as $index => $id) {
                // Récupérer les valeurs correspondantes pour chaque ligne
                $img = mysqli_real_escape_string($connexion, $imgs[$index]);
                $img2 = mysqli_real_escape_string($connexion, $imgs2[$index]);
                $video = mysqli_real_escape_string($connexion, $videos[$index]);

                // Préparer et exécuter la requête de mise à jour
                $sql_update = "UPDATE `accueil` SET `video`='$video', `img2`='$img2', `img`='$img' WHERE `id_partie`='$id'";
                if ($connexion->query($sql_update) === TRUE) {
                    $miseAJourReussie = true; // Indiquer qu'une mise à jour a réussi
                } else {
                    echo "Erreur lors de la mise à jour pour l'ID $id : " . $connexion->error . "<br>";
                }
            }
        }

        // Afficher le message de mise à jour réussie une seule fois
        if ($miseAJourReussie) {
            echo "Mise à jour réussie.";
            header("Location: accueil-2.php");
        }
    ?>
</body>
</html>


