// bucata asta face ca bara de navigare sa fie dinamica

const navSlide = () => {
    const meniu = document.querySelector('.meniu');
    const nav = document.querySelector('.nav_list');
    const navlist = document.querySelectorAll('.nav_list li')

    meniu.addEventListener('click', () => {
        //Toggle nav
        nav.classList.toggle('nav_list-active');
        //Animate list
        navlist.forEach((link, index) =>{
            if(link.style.animation) {
                link.style.animation = '';
            }else{
                link.style.animation = `navlistFade 0.5s ease forwards ${index/7 + 0.3}s`
            }
        });
    });
}
//-------------------------------------------------------------------------------------------------------------------------------------

navSlide(); //apelarea functiei

//--------------------------------------------------------------------------------------------------------------------------------------
// mai jos avem codul care face posibil schimbarea imaginei prin apasarea a doua sageti

let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("slide");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");

  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}

  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
//--------------------------------------------------------------------------------------------------------------