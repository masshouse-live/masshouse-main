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

const closeDialog = (id) => {
    const this_el = document.getElementById(id);

    $(this_el).addClass("hidden");
    $(this_el).removeClass("flex");
};

$(document).ready(function () {
    // Set up CSRF token for jQuery AJAX requests
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    if (document.querySelector("#sortable")) {
        $("#sortable").sortable({
            cursor: "move",
            update: function (event, ui) {
                // get index as child of "#sortable"
                var index_ = ui.item.index();
                // data-id attribute of ui.item
                const data_id = ui.item.data("id");
                // from index
                const prev_index = ui.item.data("from");

                // make fetch request to update order
                fetch("/admin/update-sponsor-rank/", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ), // Add CSRF token to headers
                    },
                    body: JSON.stringify({
                        rank: index_ + 1,
                        sponsor_id: data_id,
                        from_index: prev_index,
                    }),
                }).then((response) => {
                    console.log(response);
                });
            },
        });
    }

    initMenu();
    init();
});

const listednDrag = () => {
    console.log("here");
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

    // Handler for file input change on .drag-drop
    $("input[type='file']").on("change", function (e) {
        console.log(e.target.files[0]);
        // is child of .drag-drop
        e.preventDefault();
        if (!$(e.target).parent().hasClass("drag-drop")) {
            return;
        }
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
};
$(document).ready(function () {
    listednDrag();
});

const addExtraImage = () => {
    // existing images
    const index = $("#extra_images").children().length;
    // add max 5 images
    if (index >= 6) {
        alert("Maximum 5 images allowed");
        return;
    }
    html = `<label class="drag-drop h-60 bg-secondary py-2 border-2 text-center justify-center items-center flex border-dashed col-span-1"> <h6 class="font-bold">Select or Drop Image</h6>
 <input type="file" name="image${index}" id="image${index}" class="hidden" />  <div class="overlay"></div></label>`;

    // add html before add_extra_image div inside extra_images div
    $("#add_extra_image").before(html);
    listednDrag();
};

const showDetails = (div_id) => {
    const div = document.getElementById(div_id);
    // find div with id add either add or remove class show
    // remove show for all other divs with class order-details
    const divs = document.querySelectorAll(".order-details");
    divs.forEach((d) => {
        if (d !== div) {
            d.classList.remove("show");
        }
    });
    if (div.classList.contains("show")) {
        div.classList.remove("show");
    } else {
        div.classList.add("show");
    }
};
