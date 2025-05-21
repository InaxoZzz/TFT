<?php
session_start(); // Démarrage de la session

$connexion = new mysqli("localhost", "root", "", "base_connexion");
if ($connexion->connect_error) {
    die("Erreur de connexion : " . $connexion->connect_error);
}

if (!empty($_POST["username"]) && !empty($_POST["password"])) {
    $login = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $connexion->prepare("SELECT * FROM utilisateurs WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $utilisateur = $result->fetch_assoc();

        if (password_verify($password, $utilisateur["mot_de_passe"])) {
            $_SESSION["login"] = $login;
            header("Location: accueil.php");
            exit;
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Nom d'utilisateur introuvable. <a href='connexion.html'>Se connecter</a>";
    }
} else {
    echo "Veuillez remplir tous les champs.";
}
?>


<html>
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
    </head>
    <body style="background-color: #1D1E20; font-family: Arial; color: #FFFFFF; text-align: center;"></body>
</html>