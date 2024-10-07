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

// Requête SQL pour récupérer la liste des contactes
$sql = "SELECT * FROM `contact`";
$resultat = $connexion->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste-contactes</title>

    <!-- FICHIER CSS DE BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5dc; /* beige clair */
        }

        .container {
            margin-top: 50px;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .table {
            background-color: #fff; /* Fond blanc pour la table */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>VOICI LA LISTE DES CONTACTES SUPERCAR</h1>
        </div>
        <br>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sexe</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>date de l'envoi</th>
                        <th>supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // AFFICHER CLIENT DANS TABLEAU ? A CHANGER SI PAS BON 
                    
                    if ($resultat->num_rows > 0) { //TANT QU'IL Y A UNE LIGNE LIBRE DANS LA TABLE "client_inscrit" (BASE)//
                        while ($row = $resultat->fetch_assoc()) { //PERMET DE RECUP CHAQUE LIGNE SOUS FORME DE TABLEAU ASSOCIATIF AVEC LA BASE//
                            echo "<tr>";
                            echo "<td>" . $row["id_contact"] . "</td>";
                            echo "<td>" . $row["sexe"] . "</td>";
                            echo "<td>" . $row["nom"] . "</td>";
                            echo "<td>" . $row["prenom"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["message"] . "</td>";
                            echo "<td>" . $row["date_contact"] . "</td>";

                            echo "<td><form action='traitement-supprimer-contacte.php' method='post'>
                            <input type='hidden' name='id_contact' value='" . $row["id_contact"] . "'>
                            <button type='submit' class='btn btn-danger' name='supprimer' value='supprimer'>Supprimer</button></form></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Aucun message trouvé.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- FICHIER JS DE BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
