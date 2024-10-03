document.addEventListener("DOMContentLoaded", function() {
    let toggle = document.querySelector(".toggleer");
    let navigation = document.querySelector(".navigation");
    let main = document.querySelector(".main");
    toggle.onclick = function() {
        navigation.classList.toggle("active");
        main.classList.toggle("active");
    };
});

