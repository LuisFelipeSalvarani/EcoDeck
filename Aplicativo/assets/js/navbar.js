// const btnMobile = document.getElementById('hamburguer');

// function toggleMenu(event) {
//     if(event.type === 'touchstart') event.preventDefault();
//     const nav = document.getElementById('menu');
//     nav.classList.toggle('active');
//     const active = nav.classList.contains('active');
//     event.currentTarget.setAttribute('aria-expanded', active);
//     if(active) {
//         event.currentTarget.setAttribute('aria-label', 'Fechar Menu');
//     } else {
//         event.currentTarget.setAttribute('aria-label', 'Abrir Menu');
//     }

//     btnMobile.addEventListener('click', toggleMenu);
//     btnMobile.addEventListener('touchstart', toggleMenu);
// }

const btnMobile = document.getElementById('hamburguer');
const nav = document.getElementById('menu');

function toggleMenu(event) {
    if (event.type === 'touchstart') {
        event.preventDefault();
    }
    
    nav.classList.toggle('active');
    const active = nav.classList.contains('active');
    
    btnMobile.setAttribute('aria-expanded', active);
    btnMobile.setAttribute('aria-label', active ? 'Fechar Menu' : 'Abrir Menu');
}

btnMobile.addEventListener('click', toggleMenu);
btnMobile.addEventListener('touchstart', toggleMenu);
