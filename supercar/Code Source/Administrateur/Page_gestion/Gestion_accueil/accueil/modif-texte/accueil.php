<?php
session_start();
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['identifiant'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header("Location: ../../../../index.php");
    exit();
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil-Admin</title>

    <!-- FICHIER CSS DE BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5dc; /* beige clair */
        }

        .container {
            margin-top: 50px;
        }

        .title
        {
            text-align: center;
            margin-bottom: 20px;
        }

    </style>

    <?php
        // mettre en ligne la connexion avec la base de données
        include ("../../../../include_bdd/connexion.bdd.php");

        // Vérifier si le formulaire a été soumis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérer les valeurs soumises
            $id = $_POST["id"];
            $titre = $_POST["titre"];
            $texte = $_POST["texte"];
            
            // Préparer et exécuter la requête de mise à jour
            $sql_update = "UPDATE `accueil` SET `titre`='$titre', `texte`='$texte' WHERE `id_partie`='$id'";
            if ($connexion->query($sql_update) === TRUE) {
                echo "Mise à jour réussie.";
            } else {
                echo "Erreur lors de la mise à jour : " . $connexion->error;
            }
        }

        // Requête SQL pour récupérer les données
        $sql = "SELECT * FROM `accueil`";
        $resultat = $connexion->query($sql);
    ?>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>MODIFIER LES TITRES ET TEXTES</h1>
            <p align="right">
                <a href="../choix-accueil.php" class="btn btn-info"> Retour</a>
            </p>
        </div>
        <br><br>

        <!-- Ajouter le formulaire de mise à jour -->
    <form method="post" action="accueil-traitement.php">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center" >ID</th>
                    <th class="text-center">Titre</th>
                    <th class="text-center">Texte</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $index = 0; // Initialiser l'indice
                    while ($row = $resultat->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_partie"] . "</td>";
                        echo "<td><input class='form-control' type='text' name='titre[$index]' value='" . $row["titre"] . "'></td>";
                        echo "<td><textarea class='form-control' name='texte[$index]'>" . $row["texte"] . "</textarea></td>";
                        echo "<td><br><p align='center'> <input type='hidden' name='id[$index]' value='" . $row["id_partie"] . "'><input class='btn btn-warning' type='submit' value='Modifier'> </p></td>";
                        echo "</tr>";
                        $index++; // Incrémenter l'indice pour la prochaine ligne
                    }
                ?>
            </tbody>
        </table>
    </form>

    </div>
    <!-- FICHIER JS DE BOOTSTRAP (dans body : éviter de ralentir la page > pas indispensable) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
