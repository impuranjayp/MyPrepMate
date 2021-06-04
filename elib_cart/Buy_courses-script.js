const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-link, .head-button');

    
    burger.addEventListener('click', () => {
        //Toggle Nav
        nav.classList.toggle('nav-active');

        //Animate Links
        navLinks.forEach((link, index) =>{
            if (link.style.animation){
                link.style.animation = ''
            }else{
                link.style.animation = link.style.animation = `navLinkFade 0.5s ease forwards ${index / 5 + 0.8}s`;
            }
        })

        //Burger Animation
        burger.classList.toggle('toggle');
    });


}

navSlide();