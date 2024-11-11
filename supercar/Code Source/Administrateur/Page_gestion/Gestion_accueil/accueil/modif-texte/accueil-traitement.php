<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise a Jour</title>
</head>
<body>
    <?php
        // mettre en ligne la connexion avec la base de données
        include ("../../../../include_bdd/connexion.bdd.php");

        $miseAJourReussie = false; // Initialisation de la variable pour savoir si au moins une mise à jour a réussi

        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les valeurs soumises
            $titres = $_POST["titre"];
            $textes = $_POST["texte"];
            $ids = $_POST["id"];
            
            // Parcourir les tableaux des valeurs soumises
            foreach ($ids as $index => $id) {
                // Récupérer les valeurs correspondantes pour chaque ligne
                $titre = mysqli_real_escape_string($connexion, $titres[$index]);
                $texte = mysqli_real_escape_string($connexion, $textes[$index]);
                
                // Préparer et exécuter la requête de mise à jour
                $sql_update = "UPDATE `accueil` SET `titre`='$titre', `texte`='$texte' WHERE `id_partie`='$id'";
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
            header("Location: accueil.php");

        }
    ?>
</body>
</html>

