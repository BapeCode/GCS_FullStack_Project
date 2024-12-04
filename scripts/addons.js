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



// Search Click

const input = document.querySelector('#search-input')
const Search = document.querySelector('#search')
const searchInput = document.querySelector('.search-input')

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

const user = document.querySelector('#user')
const signbtns = document.querySelector('.sign-btns')

// Humburger Click

hamburger.addEventListener('click', () => {
    if (signbtns.classList.contains('open')) {
        signbtns.classList.toggle('open')
    }
    hamburger.classList.toggle('open')
    navLinks.classList.toggle('open')
})

// Sign Click

user.addEventListener('click', () => {
    if (navLinks.classList.contains('open')) {
        navLinks.classList.toggle('open')
    }
    signbtns.classList.toggle('open')
})