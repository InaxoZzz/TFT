<?php
// Connexion à la base de données MySQL (XAMPP inclut MySQL par défaut)
$serveur = "localhost";
$utilisateur = "root"; // Nom d'utilisateur par défaut de XAMPP
$mot_de_passe = ""; // Laissez le mot de passe vide par défaut de XAMPP
$base_de_donnees = "base_connexion"; // Remplacez par le nom de votre base de données

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}

if (!empty($_POST["login"]) && !empty($_POST["password"])) {
    $login = $_POST["login"];
    $password = $_POST["password"];

// Vérifier si le login existe déjà
// requête préparé
$sql = "SELECT * FROM utilisateurs WHERE login = ?";
// préparation de la connexion à la base sql
$requete = $connexion -> prepare($sql);
// lier la variable $login à la requête
    $requete -> bind_param("s", $login);
// exécuter la requête
    $requete -> execute();
// récupération du résultat de la requête
    $resultat = $requete->get_result();

// si le résultat contient des lignes c'est que le login existe déjà
    if ($resultat -> num_rows > 0) {
        echo "Ce login est déjà pris. <a href='inscription.html'>Essayez un autre login</a>.";
    } 
else {
        // Fermer la première requête
        $requete->close();

        // Hachage du mot de passe avant insertion
        $mot_de_passe = password_hash($password, PASSWORD_DEFAULT);  // Hachage sécurisé

        // Insérer le nouvel utilisateur
        $sql = "INSERT INTO utilisateurs (login, password) VALUES (?, ?)";
        $requete = $connexion -> prepare($sql);
        $requete -> bind_param("ss", $login, $mot_de_passe);
        
        if ($requete->execute()) {
            echo "Inscription réussie ! <a href='connexion.html'>Se connecter</a>";
        } else {
            echo "Erreur lors de l'inscription : " . $requete->error;
        }
    }

    // Fermer la requête et la connexion
    $requete -> close();
} 
else {
    echo "Veuillez remplir tous les champs.";
}

$connexion->close();
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Inscription</title>
    </head>
    <body style="background-color: #1D1E20; font-family: Arial; color: #FFFFFF; text-align: center;"></body>
</html>