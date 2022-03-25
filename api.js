const navSlide = () => {
    const meniu = document.querySelector('.meniu');
    const nav = document.querySelector('.nav_list');
    const navlist = document.querySelectorAll('.nav_list li')

    meniu.addEventListener('click', () => {
        nav.classList.toggle('nav_list-active');
    });
}

navSlide();