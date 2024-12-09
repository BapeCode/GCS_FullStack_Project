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

// Mode par default


const config = {
    collaborator: [
        {
            name: "GERARD Maxime",
            subtitle: "First years at Guardia School Cybersecurity",
            image: 'maxime_little.png',
            url: "CV/maxime.html"
        },
        {
            name: "CHAUDHRY Taha",
            subtitle: "First years at Guardia School Cybersecurity",
            image: 'taha_little.png',
            url: "back-end/cv.php?name=taha"
        },
        {
            name: "BREHIN Eliott",
            subtitle: "First years at Guardia School Cybersecurity",
            image: 'eliott_little.png',
            url: "CV/eliott.html"
        },
        {
            name: "FOREST Mathieu",
            subtitle: "First years at Guardia School Cybersecurity",
            image: 'mathieu_little.png',
            url: "back-end/cv.php?name=mathieu"
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
