<?php
$connexion = new mysqli("localhost", "root", "", "base_connexion");
if ($connexion->connect_error) {
    die("Erreur de la connexion : " . $connexion->connect_error);
}

if (!empty($_POST["username"]) && !empty($_POST["password"])) {
    $login = $_POST["username"];
    $mot_de_passe = $_POST["password"];

    // Vérification de l'existence de l'utilisateur
    $requete = $connexion->prepare("SELECT * FROM utilisateurs WHERE login = ?");
    $requete = $connexion->prepare("SELECT * FROM utilisateurs WHERE login = ?");
    $requete->bind_param("s", $login);
    $requete->execute();
    $result = $requete->get_result();

    if ($result->num_rows > 0) {
        echo "L'utilisateur existe déjà.";
    } else {
       $stmt = $connexion->prepare("INSERT INTO utilisateurs (login, mot_de_passe) VALUES (?, ?)");
       $stmt->bind_param("ss", $login, $mot_de_passe);

       if ($stmt->execute()) {
        echo "Inscription réussie !";
       } else {
        echo "Erreur lors de l'inscription.";
       }
    }
} else {
    echo "Veuillez remplir tous les champs.";
}
?>