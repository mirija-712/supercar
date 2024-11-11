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
            $img = $_POST["img"];
            $img2 = $_POST["img2"];
            $video = $_POST["video"];

            // Préparer et exécuter la requête de mise à jour
            $sql_update = "UPDATE `accueil` SET `video`='$video', `img2`='$img2', `img`='$img', 'titre'='$titre' WHERE `id_partie`='$id'";
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
            <h1>MODIFIER LES IMAGES ET VIDEOS</h1>
            <p align="right">
                <a href="../choix-accueil.php" class="btn btn-info"> Retour</a>
            </p>
        </div>
        <br>
        <!-- Ajouter le formulaire de mise à jour -->
    <form method="post" action="accueil-traitement-2.php">
        <table class='table table-striped table-bordered'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Image</th>
                    <th>Image 2</th>
                    <th>Video</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $index = 0; // Initialiser l'indice
                    while ($row = $resultat->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_partie"] . "</td>";
                        echo "<td>" . $row["titre"] . "</td>";
                        echo "<td><textarea name='img[$index]' class='form-control'>" . $row["img"] . "</textarea></td>";
                        echo "<td><textarea name='img2[$index]' class='form-control'>" . $row["img2"] . "</textarea></td>";
                        echo "<td><textarea name='video[$index]' class='form-control'>" . $row["video"] . "</textarea></td>";
                        echo "<td><br><input type='hidden' name='id[$index]' value='" . $row["id_partie"] . "'><input class='btn btn-warning' type='submit' value='Modifier'></td>";
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
