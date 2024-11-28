// Animation de Scroll quand on appuie sur un href
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener("click", function (e) {
        e.preventDefault(); 
        const target = document.querySelector(this.getAttribute("href"));

        target.scrollIntoView({
            behavior: "smooth",
            block: "start" 
        });
    });
});


// Animation de scroll de la class .home
document.addEventListener('DOMContentLoaded', () => {
    const homeSection = document.querySelector('.home');
    const aboutSection = document.querySelector('.about');
    const collaboratorSection = document.querySelector('.collaborator');

    const thresholds = {}; // Stocke les seuils pour chaque section

    const updateThresholds = () => {
        thresholds.home = homeSection.offsetTop + 200; // Décalage relatif
        thresholds.about = aboutSection.offsetTop - window.innerHeight / 2;
        thresholds.collaborator = collaboratorSection.offsetTop - window.innerHeight / 3;
    };

    const handleScroll = () => {
        const scrollPosition = window.scrollY;

        // Appliquer ou retirer les classes en fonction des seuils
        if (scrollPosition > thresholds.home) {
            homeSection.classList.add('scrolled');
        } else {
            homeSection.classList.remove('scrolled');
        }

        if (scrollPosition > thresholds.about) {
            aboutSection.classList.add('scrolled');
        } else {
            aboutSection.classList.remove('scrolled');
        }

        if (scrollPosition > thresholds.collaborator) {
            collaboratorSection.classList.add('scrolled');
        } else {
            collaboratorSection.classList.remove('scrolled');
        }
    };

    // Mettre à jour les seuils lors du chargement et du redimensionnement
    window.addEventListener('resize', updateThresholds);
    updateThresholds(); // Calcul initial

    // Ajouter l'écouteur pour le défilement
    window.addEventListener('scroll', handleScroll);
});


// Dark Mode / Light Mode

const ColorMode = document.getElementById('color-mode')

ColorMode.addEventListener('click', () => {
    const body = document.querySelector('body')

    if (body.classList.contains('light-mode')) {
        body.classList.add('dark-mode')
        body.classList.remove('light-mode')
    } else if (body.classList.contains('dark-mode')) {
        body.classList.remove('dark-mode')
        body.classList.add('light-mode')
    }
})

// Nav Bar Respensive

const MobileNav = document.querySelector('#nav-phone')
const NavLink = document.querySelector('.nav')

MobileNav.addEventListener('click', (e) => {

    NavLink.classList.toggle('mobile-nav')

})

// Search animation

const CloseSearch = document.querySelector('#close-search')
const Search = document.querySelector('#search')
const SearchLink = document.querySelector('.search')
const inputSearch = document.querySelector('#input-search')

Search.addEventListener('click', () => {
    SearchLink.style.display = "flex"
    SearchLink.classList.toggle('search-container')
})

CloseSearch.addEventListener('click', () => {
    SearchLink.classList.add('search-close')
    setTimeout(() => {
        SearchLink.classList.remove('search-container')
        SearchLink.classList.remove('search-close')
        SearchLink.style.display = "none"
    }, 1500)
})

console.log(inputSearch.value)

const config = {
    collaborator: [
        {
            name: "GERARD Maxime",
            subtitle: "First years at Guardia School Cybersecurity",
            image: 'maxime_little.png',
            url: "#"
        },
        {
            name: "CHAUDHRY Taha",
            subtitle: "First years at Guardia School Cybersecurity",
            image: 'taha_little.png',
            url: "#"
        },
        {
            name: "BREHIN Eliott",
            subtitle: "First years at Guardia School Cybersecurity",
            image: 'eliott_little.png',
            url: "#"
        },
        {
            name: "FOREST Mathieu",
            subtitle: "First years at Guardia School Cybersecurity",
            image: 'mathieu_little.png',
            url: "CV/mathieu.html"
        },
    ]
}


document.addEventListener("DOMContentLoaded", () => {
    const collaborator_container = document.getElementById("collaborator-config")


    config.collaborator.forEach((key) => {
        const container_items = document.createElement("div")
        const img = document.createElement("img")
        const h1 = document.createElement("h1")
        const p = document.createElement("p")
        const a = document.createElement("a")
        container_items.className = "container-items"
        h1.className = "title"
        p.className = "subtitle"

        img.src = "assets/collaborator/" + key.image
        h1.textContent = key.name
        p.textContent = key.subtitle
        a.href = key.url
        a.textContent = "View more"
        
        container_items.appendChild(img)
        container_items.appendChild(h1)
        container_items.appendChild(p)
        container_items.appendChild(a)

        collaborator_container.appendChild(container_items)
    })
})
