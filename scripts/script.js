let lastScrollY = 0; // Position précédente du scroll

window.addEventListener("scroll", function () {
  const header = document.querySelector(".home");

  if (window.scrollY > lastScrollY) {
    // Scroll vers le bas
    header.classList.remove("scrolled-up");
    header.classList.add("scrolled-down");
  } else {
    // Scroll vers le haut
    header.classList.remove("scrolled-down");
    header.classList.add("scrolled-up");
  }

  lastScrollY = window.scrollY; // Mise à jour de la position
});