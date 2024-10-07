<!-- ALTER TABLE `demande_essai` 
ADD COLUMN `etat` TEXT NOT NULL DEFAULT 'en attente' AFTER `heure_arriver`; 

POUR ETAT "EN ATTENTE" -->

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

// Requête SQL pour récupérer DEMANDE ESSAI
$sql = "SELECT * FROM `demande_essai`";
$resultat = $connexion->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste-clients</title>

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
            <h1>VOICI LA LISTE DES DEMANDE D'ESSAI DE SUPERCAR</h1>
        </div>
        <br>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Nom d'utilisateur</th>
                        <th>Nom du modele</th>
                        <th>heure d'arriver</th>
                        <th>etat</th>
                        <th>confirmation</th>
                        <th>supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // AFFICHER CLIENT DANS TABLEAU ? A CHANGER SI PAS BON 
                    
                    if ($resultat->num_rows > 0) { //TANT QU'IL Y A UNE LIGNE LIBRE DANS LA TABLE "client_inscrit" (BASE)//
                        while ($row = $resultat->fetch_assoc()) { //PERMET DE RECUP CHAQUE LIGNE SOUS FORME DE TABLEAU ASSOCIATIF AVEC LA BASE//
                            echo "<tr>";
                            echo "<td>" . $row["id_demande_essai"] . "</td>";
                            echo "<td>" . $row["date_demande"] . "</td>";
                            echo "<td>" . $row["nom_utilisateur"] . "</td>";
                            echo "<td>" . $row["nom_modele"] . "</td>";
                            echo "<td>" . $row["heure_arriver"] . "</td>";
                            echo "<td>" . $row["etat"] . "</td>";

                            // BOUTON CONFIRMER
                            echo "<td><form action='traitement-confirmer-demande.php' method='post'>
                            <input type='hidden' name='id_demande_essai' value='" . $row["id_demande_essai"] . "'>
                            <button type='submit' class='btn btn-danger' name='confirmer' value='lu'>Confirmer</button></form></td>";

                            // POUR SUPPRIMER
                            echo "<td><form action='traitement-supprimer-demande.php' method='post'>
                            <input type='hidden' name='id_demande_essai' value='" . $row["id_demande_essai"] . "'>
                            <button type='submit' class='btn btn-danger' name='supprimer' value='supprimer'>Supprimer</button></form></td>";

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Aucune demande d'essai trouvée.</td></tr>";
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
