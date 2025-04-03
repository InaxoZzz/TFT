<?php
$connexion = new mysqli("localhost", "root", "", "base_connexion");
if ($connexion->connect_error) {
    die("Erreur de la connexion : " . $connexion->connect_error);
}

if (!empty($_POST["username"]) && !empty($_POST["password"])) {
    $login = $_POST["username"];
    $password = $_POST["password"];

    // Vérification de l'existence de l'utilisateur
    $stmt = $connexion->prepare("SELECT * FROM utilisateurs WHERE login = ?");
    $requete = $connexion->prepare($stmt);
    $requete->bind_param("s", $login);
    $requete->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "L'utilisateur existe déjà.";
    } else {
       $requete->close();
    }
} else {
    echo "Veuillez remplir tous les champs.";
}
?>