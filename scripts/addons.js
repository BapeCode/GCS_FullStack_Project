// Dark Mode / Light Mode

setAppearance()

function setAppearance() {
    const defaultMode = window.matchMedia('(prefers-color-scheme: dark)');

    if (defaultMode.matches) {
        document.body.classList.add('dark-mode')
    } else {
        document.body.classList.add('light-mode')
    }
}

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


// Get Current Page


const input = document.querySelector('#search-input')
const Search = document.querySelector('#search')
const searchInput = document.querySelector('.search-input')

// Search Click

Search.addEventListener('click', () => {
    if (searchInput.classList.contains('open')) {
        searchInput.classList.remove('open')
        setTimeout(() => {
            input.style.display = "none"
        }, 300)
    } else {
        input.style.display = "block"
        searchInput.classList.add('open')
    }
})

// Nav Bar Respensive

const hamburger = document.querySelector('.humburger')
const navLinks = document.querySelector('.navlinks-container')

hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('open')
    navLinks.classList.toggle('open')
})