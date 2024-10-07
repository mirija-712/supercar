<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

 <?php
 // définir vos paramètres de connexion avec la base de donnéesz
 
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
 }
 else{
 echo "";
 }
 // changer le jeu de caractères à utf8
 mysqli_set_charset($bdd, "utf8");
 ?>
 
 </form> 
</body>
</html>