<?php
$tournois = [
    "inscription_spatula_tour_2v2_3",
    "inscription_spatula_tour_1v1_2"
];

$resultats = [];

foreach ($tournois as $id) {
    $fichier = __DIR__ . "/data/inscriptions/" . $id . ".json";
    if (file_exists($fichier)) {
        $inscriptions = json_decode(file_get_contents($fichier), true);
        $resultats[$id] = count($inscriptions);
    } else {
        $resultats[$id] = 0;
    }
}

echo json_encode($resultats);
