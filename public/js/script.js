const hamburgerMenu = document.getElementById("hamburger");

if (hamburgerMenu) {
    hamburgerMenu.addEventListener("click", () => {
        const menu = document.getElementById("mobile-menu");
        menu.classList.toggle("hidden");
    });
}
