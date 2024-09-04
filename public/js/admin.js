const init = () => {
    // find sidebar links and identify if they are active
    const sidebarLinks = document.querySelectorAll(".sidebar-link");
    console.log(sidebarLinks);
    sidebarLinks.forEach((link) => {
        if (link.getAttribute("href") === window.location.pathname) {
            link.classList.add("active");
            link.classList.remove("not-active");
        } else {
            link.classList.add("not-active");
            link.classList.remove("active");
        }
    });
};
const initMenu = () => {
    $("#menu ul").hide();
    $("#menu li a").click(function () {
        $("#menu ul").hide("normal");
        console.log($(this).next());
        // check if the next element is hidden
        if ($(this).next().is(":hidden")) {
            $(this).next().slideToggle("normal");
        }
    });
};
$(document).ready(function () {
    initMenu();
});
(() => {
    init();
})();
