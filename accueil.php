<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Accueil</title>
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
                            <?php session_start(); include "header.php"; ?>
                        </li>
                    </ul>
                </header>
            </div>
        </nav>

        <div id="container_accueil">
            <h2>
                Bienvenue sur le site de TFT
            </h2>

            <p>
                Ici, vous pourrez trouver des informations sur les meilleures compositions 
                du jeu. Vous pourrez également vous inscrire pour participer à des tournois 
                et gagner des récompenses !
            </p>
        </div>


    </body>
</html>