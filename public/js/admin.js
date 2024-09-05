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
    // get next and add "flex" class
    const this_el = document.getElementById(id);

    $(this_el).addClass("flex");
    $(this_el).removeClass("hidden");
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
$(document).ready(function () {
    // Function to handle setting the background image
    function setBackgroundImage(element, imageSrc) {
        $(element).css("background-image", "url(" + imageSrc + ")");
        $(element).css("background-size", "cover");
        $(element).css("background-position", "center");
    }

    // Function to show the overlay
    function showOverlay(element) {
        $(element).find(".overlay").show();
    }

    // Function to hide the overlay
    function hideOverlay(element) {
        $(element).find(".overlay").hide();
    }

    // Handler for drag enter
    $(".drag-drop").on("dragenter", function (e) {
        e.preventDefault();
        showOverlay(this);
    });

    // Handler for drag over
    $(".drag-drop").on("dragover", function (e) {
        e.preventDefault();
    });

    // Handler for drop
    $(".drag-drop").on("drop", function (e) {
        e.preventDefault();
        hideOverlay(this);

        var files = e.originalEvent.dataTransfer.files;
        if (files.length > 0) {
            var file = files[0];
            var reader = new FileReader();

            reader.onload = function (event) {
                setBackgroundImage(this, event.target.result);
            }.bind(this);

            reader.readAsDataURL(file);
        }
    });

    // Handler for file input change
    $("input[type='file']").on("change", function (e) {
        var file = e.target.files[0];
        if (file) {
            var reader = new FileReader();

            reader.onload = function (event) {
                var parentLabel = $(e.target).parent();
                setBackgroundImage(parentLabel, event.target.result);
            };

            reader.readAsDataURL(file);
        }
    });

    // Hide overlay when drag leaves the drop area
    $(".drag-drop").on("dragleave", function (e) {
        e.preventDefault();
        hideOverlay(this);
    });
});
