<?php
if (session_status() === PHP_SESSION_NONE){
    session_start();
}

$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "base_connexion";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}

if (!isset($_SESSION['login'])) {
    $connecte = false;
} else {
    $connecte = true;
    $login = $_SESSION['login'];
}

// Si formulaire soumis et connecté
if ($connecte && isset($_POST['commentaire']) && trim($_POST['commentaire']) !== '') {
    $commentaire = trim($_POST['commentaire']);

    // Préparer la requête pour éviter injection SQL
    $sql = "INSERT INTO commentaires (login, commentaire) VALUES (?, ?)";
    $stmt = $connexion->prepare($sql);
    $stmt->bind_param("ss", $login, $commentaire);
    $stmt->execute();
    $stmt->close();
}

// Récupérer les commentaires
$sql = "SELECT login, commentaire, date_post FROM commentaires ORDER BY date_post DESC";
$resultat = $connexion->query($sql);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="style_comm.css">
        <title>Commentaires</title>
    </head>

    <body>
        <nav id="nav_accueil">
            <div class="nav_container">
                <header>
                    <h1 id="titre">
                        <a id="accueil" href="accueil.php">TFT</a>
                    </h1>
                
                    <ul id="nav_liens">
                        <li>
                            <a href="compos.php">Compositions</a>
                        </li>
                        <li>
                            <a href="tournois.php">Tournois</a>
                        </li>
                        <li>
                            <a href="comm.php">Commentaires</a>
                        </li>
                        <li>
                            <a href="connexion.html">Se connecter</a>
                        </li>
                        <li>
                            <a href="inscription.html">S'inscrire</a>
                        </li>
                        <li>
                            <?php include "header.php"; ?>
                        </li>
                    </ul>
                </header>
            </div>
        </nav>

        <div id="publier_comm">
            <h1>Commentaires</h1>
            <?php if ($connecte): ?>
                <form method="post" action="comm.php">
                    <textarea name="commentaire" rows="4" cols="50" placeholder="Écrire un commentaire..."></textarea><br>
                    <button type="submit">Publier</button>
                </form>
            <?php else: ?>
                <p>Vous devez être connecté pour publier un commentaire.</p>
            <?php endif; ?>
        </div>

        <div id="liste_comm">
            <?php
            $commentaires = [];
            if($resultat && $resultat->num_rows > 0){
                while($row = $resultat->fetch_assoc()){
                    $commentaires[] = $row;
                }
            }
            foreach ($commentaires as $c): ?>
                <div class="commentaire">
                    <p class="login"><?= htmlspecialchars($c['login']) ?></p> — 
                    <p class="date_post"><?= htmlspecialchars($c['date_post']) ?></p><br>
                    <?= nl2br(htmlspecialchars($c['commentaire'])) ?>
                </div>
            <?php endforeach; ?>
        </div>
    </body>
</html>