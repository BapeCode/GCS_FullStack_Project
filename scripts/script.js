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


// Animation de scroll de la class .home
document.addEventListener('DOMContentLoaded', () => {
    const homeSection = document.querySelector('.home');
    const aboutSection = document.querySelector('.about');
    const collaboratorSection = document.querySelector('.collaborator');

    const handleScroll = () => {
        const scrollPosition = window.scrollY;

        
        if (scrollPosition > 50) {
            homeSection.classList.add('scrolled');
        } else {
            homeSection.classList.remove('scrolled');
        }

        if (scrollPosition > 250) {
            aboutSection.classList.add('scrolled')
        } else {
            aboutSection.classList.remove('scrolled')
        }

        if (scrollPosition > 1500) {
            collaboratorSection.classList.add('scrolled')
        } else {
            collaboratorSection.classList.remove('scrolled')
        }
    };

    window.addEventListener('scroll', handleScroll);
});

// Animation cursor custom
const customCursor = document.getElementById('custom-cursor');

document.addEventListener('mousemove', (e) => {
  customCursor.style.transform = `translate(${e.clientX - 10}px, ${e.clientY - 10}px)`;
});

document.addEventListener('mouseleave', () => {
    customCursor.style.transform = 'scale(0)';
});
  
document.addEventListener('mouseenter', () => {
    customCursor.style.transform = 'scale(1)';
});



// Config of the collaborator and other in the futur

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
            url: "#"
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

