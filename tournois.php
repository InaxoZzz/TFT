<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="style_tournois.css">
        <title>Tournois</title>
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

        <div id="container_tournois">
            <h1>Tournois à venir</h1>
            <div class="tournois">
                <div class="spatula_tour">
                    <h2>Spatula Tour 2v2 étape 03</h2>
                    <p>L'heure est venue de lancer le <strong>dernier Open Qualifier Double up</strong>. Dernier Open Qualifier
                        signifie <strong>dernière chance pour vous de vous qualifier</strong> au Double Up MAJOR France pour ce set 14 !
                    </p>

                    <p>Formez votre meilleur duo et venez tenter de décrocher une place pour le Double Up MAJOR France !</p>

                    <p>Clôture des inscription : <strong>26 mai 2025 - 23h59</strong></p>

                    <p>Qui seront les quatre derniers duos à rejoindre le MAJOR ?</p>

                    <p>Dates du tournoi : <strong>31 mai 2025 et 1er juin 2025* - 13h00</strong></p>
                    <p><em>* si qualifiés le premier jour</em></p>

                    <p>Vous souhaitez vous inscrire ? <button id="inscription_spatula_tour_2v2_3">Cliquez ici</button></p>
                    <p id="compteur_inscription_spatula_tour_2v2_3"></p>
                </div>

                <div class="spatula_tour">
                    <h2>Spatula Tour 1v1 étape 02</h2>
                    <p>L'heure est venue de lancer le <strong>dernier Open Qualifier</strong>. Dernier Open Qualifier
                        signifie <strong>dernière chance pour vous de vous qualifier</strong> au MAJOR France pour ce set 14 !    
                    </p>

                    <p>Clôture des inscriptions : <strong>2 juin 2025 - 23h59</strong></p>

                    <p>Qui seront les quatre derniers à rejoindre le MAJOR ?</p>

                    <p>Dates du tournoi : <strong>7 et 8* juin 2025 - 13h00</strong></p>
                    <p><em>* si qualifié le premier jour</em></p>

                    <p>Vous souhaitez vous inscrire ? <button id="inscription_spatula_tour_1v1_2">Cliquez ici</button></p>
                    <p id="compteur_inscription_spatula_tour_1v1_2"></p>
                </div>
            </div>

            <h1>Tournois passés</h1>
            <div class="tournois">
                <div class="spatula_tour">
                    <h2>Spatula Tour 2v2 étape 01</h2>
                    <p>GG à nos quatre premiers duos qualifiés !</p>
                </div>

                <div class="spatula_tour">
                    <h2>Spatula Tour 2v2 étape 02</h2>
                    <p>GG à nos quatre autres duos qualifiés !</p>
                </div>

                <div class="spatula_tour">
                    <h2>Spatula Tour 1v1 étape 01</h2>
                    <p>GG à nos quatre premiers qualifiés !</p>
                </div>
                </div>
        </div>

        <script src="tournois.js"></script>
    </body>
</html>