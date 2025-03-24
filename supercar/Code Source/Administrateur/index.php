<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration Supercar</title>

    <!-- FICHIER CSS DE BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #1a237e;
            --secondary-color: #0d47a1;
            --accent-color: #2196f3;
            --background-color: #f5f6fa;
            --text-color: #2c3e50;
            --card-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
            --gradient-primary: linear-gradient(135deg, #1a237e 0%, #0d47a1 100%);
            --gradient-accent: linear-gradient(135deg, #2196f3 0%, #1976d2 100%);
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            color: var(--text-color);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 1000px;
            padding: 1.5rem;
        }

        .title {
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }

        .title h1 {
            color: var(--primary-color);
            font-weight: 700;
            font-size: 2.2rem;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .title::after {
            content: '';
            display: block;
            width: 120px;
            height: 3px;
            background: var(--gradient-accent);
            margin: 15px auto;
            border-radius: 3px;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient-accent);
        }

        .form-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        .form-container h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: var(--primary-color);
            text-align: center;
            font-weight: 600;
        }

        .form-container label {
            font-weight: 500;
            color: var(--primary-color);
            margin-bottom: 10px;
            font-size: 0.95rem;
        }

        .form-control {
            border-radius: 8px;
            border: 1.5px solid #e9ecef;
            padding: 10px 15px;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            background: rgba(255, 255, 255, 0.9);
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(33, 150, 243, 0.15);
            background: white;
        }

        .btn-primary {
            background: var(--gradient-primary);
            border: none;
            border-radius: 8px;
            padding: 12px 25px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            width: 100%;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            background: var(--gradient-accent);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(33, 150, 243, 0.3);
        }

        .form-container img {
            max-width: 120px;
            height: auto;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
            filter: drop-shadow(0 3px 4px rgba(0, 0, 0, 0.1));
        }

        .form-container img:hover {
            transform: scale(1.05);
        }

        .thin-form {
            max-width: 400px;
            margin: auto;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--accent-color);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .input-group .form-control {
            padding-left: 40px;
        }

        .input-group .form-control:focus + i {
            color: var(--primary-color);
        }

        .admin-image {
            border-radius: 15px;
            box-shadow: var(--card-shadow);
            transition: transform 0.3s ease;
            filter: drop-shadow(0 3px 4px rgba(0, 0, 0, 0.1));
        }

        .admin-image:hover {
            transform: translateY(-5px) scale(1.02);
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .title h1 {
                font-size: 1.8rem;
            }
            
            .form-container {
                padding: 1.5rem 1rem;
            }

            .admin-image {
                margin-bottom: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">
            <h1>Administration Supercar</h1>
        </div>

        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="https://cours-informatique-gratuit.fr/wp-content/uploads/2014/05/administrateur.png" alt="Administration" class="img-fluid admin-image">
            </div>

            <div class="col-md-6">
                <div class="form-container thin-form">
                    <center>
                        <img src="https://cdn.dribbble.com/users/1889528/screenshots/7239609/media/9618c7e174ae3ddf8aed3322cb86008e.jpg" alt="Logo" class="mb-4">
                    </center>

                    <form id="form-admin" method="POST" action="Fonction_php/connect-admin.php">
                        <div class="input-group">
                            <input type="text" class="form-control" id="identifiant" name="identifiant" placeholder="Votre identifiant" required>
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="input-group">
                            <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" placeholder="Votre mot de passe" required>
                            <i class="fas fa-lock"></i>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-sign-in-alt me-2"></i>Se connecter
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
