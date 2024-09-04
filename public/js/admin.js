const init = () => {
    // find sidebar links and identify if they are active
    const sidebarLinks = document.querySelectorAll(".sidebar-link");
    sidebarLinks.forEach((link) => {
        const navLink = link.getAttribute("href");
        console.log(navLink);
        let url = new URL(navLink);
        if (url.pathname === window.location.pathname) {
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
    console.log(document.querySelector("#sortable"));
    if (document.querySelector("#sortable")) {
        $("#sortable").sortable();
    }
    init();
})();
