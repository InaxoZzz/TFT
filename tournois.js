document.addEventListener("DOMContentLoaded", function () {
    // Affichage initial des compteurs
    fetch("get_inscriptions.php")
        .then(res => res.json())
        .then(data => {
            for (let id in data) {
                const compteur = document.getElementById("compteur_" + id);
                if (compteur) {
                    compteur.innerText = data[id] + " inscrit(s)";
                }
            }
        });

    // Gestion des clics sur les boutons
    const boutons = document.querySelectorAll("button[id^='inscription_spatula_tour']");
    boutons.forEach(button => {
        button.addEventListener("click", function () {
            const tournoi = this.id;

            fetch("inscription_tournoi.php", {
                method: "POST",
                headers: { "Content-Type": "application/x-www-form-urlencoded" },
                body: "tournoi=" + encodeURIComponent(tournoi)
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === "success") {
                    const compteur = document.getElementById("compteur_" + tournoi);
                    compteur.innerText = data.inscrits + " inscrit(s)";
                } else {
                    alert(data.message);
                }
            });
        });
    });
});

