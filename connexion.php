<?php
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
            echo "Connexion réussie !";
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Nom d'utilisateur introuvable.";
    }
} else {
    echo "Veuillez remplir tous les champs.";
}
?>