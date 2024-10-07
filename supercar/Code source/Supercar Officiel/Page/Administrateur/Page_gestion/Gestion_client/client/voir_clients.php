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

// Requête SQL pour récupérer la liste des clients inscrits
$sql = "SELECT * FROM `client_inscrit`";
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

        .formulaire {
            background-color: #fff; /* Fond blanc */
            border: 2px solid #ccc; /* Bordure grise */
            border-radius: 5px; /* Coins arrondis */
            padding: 10px; /* Espacement intérieur réduit */
            max-width: 300px; /* Largeur maximale du formulaire */
            margin: auto; /* Centrer le formulaire */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>VOICI LA LISTE DES CLIENTS INSCRITS SUR SUPERCAR</h1>
        </div>
        <br><br>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Nom d'utilisateur</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resultat->num_rows > 0) {
                        while ($row = $resultat->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id_client"] . "</td>";
                            echo "<td>" . $row["nom"] . "</td>";
                            echo "<td>" . $row["prenom"] . "</td>";
                            echo "<td>" . $row["nom_utilisateur"] . "</td>";
                            echo "<td>" . $row["e_mail"] . "</td>";
                            echo "<td>
                                    <form action='traitement-clients.php' method='post'>
                                        <input type='hidden' name='id_client' value='" . $row["id_client"] . "'> 
                                        <button type='submit' class='btn btn-danger'>Supprimer</button>
                                    </form>
                                </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Aucun client trouvé.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <br>
            
            <div class = "container">
                <div class="title">
                    <h1>AJOUTER UN CLIENT</h1>
                </div>
            </div>
            <br><br>
            
            <form action='traitement-ajout-clients.php' method='post' class='formulaire'>
            <div class='mb-3 text-center'>
                <strong>
                    <label for='nom' class='form-label'>Nom</label>
                </strong>
                <input type='text' class='form-control' id='nom' name='nom' required>
            </div>

            <div class='mb-3 text-center'>
                <strong>
                    <label for='prenom' class='form-label'>Prénom</label>
                </strong>
                <input type='text' class='form-control' id='prenom' name='prenom' required>
            </div>

            <div class='mb-3 text-center'>
                <strong>
                    <label for='nom_utilisateur' class='form-label'>Nom d'utilisateur</label>
                </strong>
                <input type='text' class='form-control' id='nom_utilisateur' name='nom_utilisateur' required>
            </div>

            <div class='mb-3 text-center'>
                <strong>
                    <label for='email' class='form-label'>Email</label>
                </strong>
                <input type='email' class='form-control' id='email' name='email' required>
            </div>

            <div class='mb-3 text-center'>
                <strong>
                    <label for='mots_de_passe' class='form-label'>Mot de passe</label>
                </strong>
                <input type='password' class='form-control' id='mots_de_passe' name='mots_de_passe' required>
            </div>

            <div class='mb-3 text-center'>
                <strong>
                    <label for='confirmation_mots_de_passe' class='form-label'>Confirmation du mot de passe</label>
                </strong>
                <input type='password' class='form-control' id='confirmation_mot_de_passe' name='confirmation_mots_de_passe' required>
            </div>

            <center>
                <button type='submit' class='btn btn-primary'>Ajouter</button>
            </center>
        </form>

        </div>
    </div>

    <!-- FICHIER JS DE BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
