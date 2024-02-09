document.body.style.paddingTop = "0";

document.addEventListener("DOMContentLoaded", function () {

    // Navbar animation
    let navbar = document.getElementById("homepage-navbar");

    const setNavbarTransparent = (navbar) => {
        var root = document.documentElement;
        root.style.setProperty('--homepage-navbar-primary-color', '#ffffff');

        navbar.setAttribute("style", "background-color: transparent !important; backdrop-filter: blur(0px);border-bottom: solid 2px transparent !important;");
    }
    const unsetNavbarTransparent = (navbar) => {
        var root = document.documentElement;
        root.style.setProperty('--homepage-navbar-primary-color', '#000000');

        navbar.setAttribute("style", "background-color: rgba(255, 255, 255, 0.8) !important; backdrop-filter: blur(10px); border-bottom: solid 2px #dfdfdf;");

    }

    setNavbarTransparent(navbar);

    window.addEventListener("scroll", function () {
        if (window.scrollY > this.window.screen.height * 0.65) {
            unsetNavbarTransparent(navbar);
        } else {
            setNavbarTransparent(navbar);
        }
    });
});
