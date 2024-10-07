<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu-Admin</title>

    <!-- FICHIER CSS DE BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5dc; /* beige clair */
        }

        .container {
            padding: 20px; /* Espacement intérieur du conteneur */
        }

        .card {
            background-color: #fff; /* Couleur de fond blanc */
            border-radius: 10px; /* Coins arrondis */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ombre */
            padding: 20px; /* Espacement intérieur de la carte */
            margin-bottom: 20px; /* Marge en bas de la carte */
        }

        .card-title {
            margin-bottom: 20px; /* Marge en bas du titre */
        }

        .btn {
            border-radius: 5px; /* Coins arrondis des boutons */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">
            <h1 class="text-center mt-5 mb-4">ADMINISTRATION</h1>
        </div>
        <br>

        <div class="row">
            <div class="col-md-12 text-center">

                <div class="card">
                    <h4 class="card-title">MANIPULER LA PAGE D'ACCUEIL</h4>
                    <a href="../Page_gestion/Gestion_accueil/accueil/choix-accueil.php" class="btn btn-outline-primary btn-block mb-3">PAGE D'ACCUEIL</a>
                </div>

                <div class="card">
                    <h4 class="card-title">AJOUTER UN ADMINISTRATEUR</h4>
                    <a href="../Page_gestion/Gestion_administrateur/admin/ajouter-admin.php" class="btn btn-outline-primary btn-block mb-3">AJOUTER UN ADMIN</a>
                </div>
        </div>
    </div>

    <div class = "container">
        <div class="title">
            <h1 class="text-center mt-5 mb-4">PARTIE VOITURES</h1>
        </div>

        <div class="card">
            <h4 class="card-title text-center">MANIPULER LA PAGE DE VOITURES</h4>
            <a href="../Page_gestion/Gestion_voiture/voiture/admin-voitures.php" class="btn btn-outline-primary btn-block mb-3">PAGE DE VOITURES</a>
            <a href="../Page_gestion/Gestion_demande_essai/demande-essai/voir_demande.php" class="btn btn-outline-primary btn-block mb-3">VOIR LES DEMANDES D'ESSAI</a>
        </div>
    </div>
    
    <div class = "container">
        <div class="title">
            <h1 class="text-center mt-5 mb-4">PARTIE EVENEMENTS</h1>
        </div>

        <div class="card">
            <a href="../Page_gestion/Gestion_evenement/evenement/evenement_supercar.php" class="btn btn-outline-primary btn-block mb-3">MANIPULER LA PAGE D'EVENEMENTS</a>
        </div>

    </div>

    <div class = "container">
        <div class="title">
            <h1 class="text-center mt-5 mb-4">GESTION DE CLIENTS</h1>
        </div>

        <div class = "row">
            <div class = "col-md-12 text-center">
                <div class="card">
                    <h4 class="card-title">LES CLIENTS</h4>
                    <a href="../Page_gestion/Gestion_client/client/voir_clients.php" class="btn btn-outline-primary btn-block mb-3">VOIR LES CLIENTS</a>
                </div>

                <div class="card">
                    <h4 class="card-title">MESSAGES</h4>
                    <a href="../Page_gestion/Gestion_contact/contact/voir_contactes.php" class="btn btn-outline-primary btn-block mb-3">VOIR LES CONTACTES</a>
                </div>
            </div>
        </div>
    </div>

    <!-- FICHIER JS DE BOOTSTRAP (dans body : éviter de ralentir la page > pas indispensable) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
