(function hamburgerEvents() {

    const hamburgers = $("#hamburger");
    const menupage = $("#side-menu");

    hamburgers.on("click", () => {

        // hide menu
        if (menupage.hasClass("expanded")) {
            menupage.removeClass("expanded");
            hamburgers.removeClass("expanded");

        // display menu
        } else {
            menupage.addClass("expanded");
            hamburgers.addClass("expanded");
        }
    });
})();
