document.addEventListener("DOMContentLoaded", function() {
    const carousel = document.querySelector(".carousel");
    const arrowIcons = document.querySelectorAll(".wrapper i");

    arrowIcons.forEach(icon => {
        icon.addEventListener("click", () => {
            const firstImgWidth = carousel.firstElementChild.clientWidth;
            carousel.scrollLeft += icon.id === "left" ? -firstImgWidth : firstImgWidth;
        });
    });
});
