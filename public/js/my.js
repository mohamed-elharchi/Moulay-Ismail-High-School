
//scroll button
document.addEventListener('DOMContentLoaded', function () {
    const scrollUp = () => {
        const scrollUp = document.getElementById('scroll-up');
        if (window.scrollY >= 350) {
            scrollUp.classList.add('show-scroll');
        } else {
            scrollUp.classList.remove('show-scroll');
        }
    };

    window.addEventListener('scroll', scrollUp);
});




//slid dives
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    if (slides[slideIndex - 1]) {
        slides[slideIndex - 1].style.display = "block";
    }
    if (dots[slideIndex - 1]) {
        dots[slideIndex - 1].className += " active";
    }
}






//aficher la sesion de toggle
document.addEventListener('DOMContentLoaded', function () {
    const msgeButton = document.querySelector(".togle");
    const discussionBox = document.querySelector(".discussion");

    msgeButton.addEventListener('click', () => {
        discussionBox.classList.toggle('active');
    });
});

// elharchi close im sorry ayoub

document.addEventListener('DOMContentLoaded', function () {
    const msgeButton = document.querySelector(".elharchiClose");
    const discussionBox = document.querySelector(".discussion");

    msgeButton.addEventListener('click', () => {
        discussionBox.classList.toggle('active');
    });
});


//nav media js
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('menu-btn').addEventListener('click', function() {
        document.querySelector('nav .navigation ul').classList.add('active');
    });

    document.getElementById('menu-close').addEventListener('click', function() {
        document.querySelector('nav .navigation ul').classList.remove('active');
    });
});


function showSection(gender) {
    // Hide all sections
    var sections = document.querySelectorAll('.section');
    for (var i = 0; i < sections.length; i++) {
      sections[i].style.display = 'none';
    }

    // Show the selected section
    var selectedSection = document.getElementById(gender + 'Section');
    if (selectedSection) {
      selectedSection.style.display = 'block';
    }
}

// Make sure "homme" section is displayed by default
window.onload = function() {
    showSection('homme');
};





