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

    // add event listener to .open-dialog buttons
    // add event listener to .close-dialog buttons
};
const initMenu = () => {
    $("#menu ul").hide();
    $("#menu li a").click(function () {
        $("#menu ul").hide("normal");
        if ($(this).next().is(":hidden")) {
            $(this).next().slideToggle("normal");
        }
    });
};

const openDialog = (id) => {
    const siblingDiv = $(`#${id}`).siblings();
    siblingDiv.addClass("flex");
    siblingDiv.removeClass("hidden");
};

const closeDialog = () => {
    // close any open dialogs
    $(".modal").addClass("hidden");
    $(".modal").removeClass("flex");
};

$(document).ready(function () {
    console.log(document.querySelector("#sortable"));
    if (document.querySelector("#sortable")) {
        $("#sortable").sortable();
    }
    initMenu();
    init();
});
