// Sélectionner tous les liens avec href commençant par "#"
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault(); // Empêche le comportement par défaut

        // Cibler la section liée
        const target = document.querySelector(this.getAttribute("href"));

        // Faire défiler jusqu'à la section avec animation
        target.scrollIntoView({
            behavior: "smooth", // Animation fluide
            block: "start"      // Aligne le haut de la section au haut de la fenêtre
        });
    });
});
