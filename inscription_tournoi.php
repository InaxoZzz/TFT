<?php
session_start();

if (!isset($_SESSION["login"])) {
    echo json_encode(["status" => "error", "message" => "Non connecté"]);
    exit;
}

if (isset($_POST["tournoi"])) {
    $tournoi = preg_replace("/[^a-zA-Z0-9_]/", "", $_POST["tournoi"]); // sécurité en supprimant tout caractère suspect
    $login = $_SESSION["login"];

    $fichier = __DIR__ . "/data/inscriptions/" . $tournoi . ".json";

    if (!file_exists($fichier)) {
        file_put_contents($fichier, json_encode([]));
    }

    $inscriptions = json_decode(file_get_contents($fichier), true);

    // Empêche la double inscription
    if (in_array($login, $inscriptions)) {
        echo json_encode(["status" => "error", "message" => "Déjà inscrit"]);
        exit;
    }

    $inscriptions[] = $login;
    file_put_contents($fichier, json_encode($inscriptions));

    echo json_encode(["status" => "success", "inscrits" => count($inscriptions)]);
} else {
    echo json_encode(["status" => "error", "message" => "Paramètre manquant"]);
}
