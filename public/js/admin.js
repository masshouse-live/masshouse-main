const init = () => {
    // find sidebar links and identify if they are active
    const sidebarLinks = document.querySelectorAll(".sidebar-link");
    sidebarLinks.forEach((link) => {
        const navLink = link.getAttribute("href");
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

const openEditDialog = (id, data) => {
    console.log(data);
    // get next and add "flex" class
    const this_el = document.getElementById(id);
    $(this_el).addClass("flex");
    $(this_el).removeClass("hidden");
    // get first form element
    const form = this_el.querySelector("form");
    // add input with name id to this_el and make it hidden
    const input = document.createElement("input");
    input.type = "hidden";
    input.name = "id";
    input.value = data["id"];
    form.appendChild(input);

    const allInputs = document.querySelectorAll(".edit-input");
    allInputs.forEach((input) => {
        // if file input find span with id file_[inputName] and set value]
        const inputName = input.getAttribute("name");
        if (input.type === "file") {
            const span = document.getElementById(`file_${inputName}`);
            span.innerHTML = data[input.name];
        } else {
            // if event_date spklit by " " and set date and time seprately
            if (inputName === "event_date") {
                const date = data["date_time"].split("T")[0];
                input.value = date;
            } else if (inputName === "event_time") {
                const time = data["date_time"].split("T")[1].split(".")[0];
                console.log(time);
                input.value = time;
            } else if (inputName === "event_time") {
                const time = data["date_time"].split(" ")[1];
                input.value = time;
            } else if (inputName === "event_venue") {
                input.value = data["venue"]["id"];
            } else if (
                inputName === "category" &&
                typeof data["category"] === "object"
            ) {
                input.value = data["category"]["slug"];
            } else if (input.type === "textarea") {
                // if id is myeditorinstanceedit
                const id = input.getAttribute("id");
                if (id === "myeditorinstanceedit") {
                    const editorInstance = window["editor" + id];
                    editorInstance.setData(data[inputName]);
                } else {
                    input.value = data[inputName];
                }
            } else {
                input.value = data[inputName];
            }
        }
    });

    // remove all .drag-drop children of #edit_add_extra_image
    const children = $("#extra_images_div").children();
    children.each((index, child) => {
        if ($(child).hasClass("drag-drop")) {
            $(child).remove();
        }
    });

    // if /admin/merchandise route
    if (window.location.pathname === "/admin/merchandise") {
        // add extra image
        data["images"].forEach((image, index) => {
            // add html before add_extra_image div inside extra_images div
            html = `<label 
            style="background-image: url('/${
                image.image
            }'); background-size: cover; background-position: center;"
            class="drag-drop h-60 bg-secondary py-2 border-2 text-center justify-center items-center flex border-dashed col-span-1"> <h6 class="font-bold">Select or Drop Image</h6>
 <input type="file" name="image${index + 1}"id="edit_mage${
                index + 1
            }" class="hidden" />  <div class="overlay"></div></label>`;
            $("#edit_add_extra_image").before(html);
        });
        listednDrag();
    }
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
                }).then((response) => {});
            },
        });
    }

    initMenu();
    init();
});

const listednDrag = () => {
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

const addExtraImage = (id_before, id_div) => {
    // existing images
    const index = $(`#${id_div}`).children().length;
    // add max 5 images
    if (index >= 6) {
        alert("Maximum 5 images allowed");
        return;
    }
    html = `<label class="drag-drop h-60 bg-secondary py-2 border-2 text-center justify-center items-center flex border-dashed col-span-1"> <h6 class="font-bold">Select or Drop Image</h6>
 <input type="file" name="image${index}" id="image${index}" class="hidden" />  <div class="overlay"></div></label>`;

    // add html before add_extra_image div inside extra_images div
    $(`#${id_before}`).before(html);
    listednDrag();
};

const showDetails = (div_id) => {
    const div = document.getElementById(div_id);
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

const handleFilterInput = () => {
    // Find all elements with class 'filter-input'
    const filterInputs = document.querySelectorAll(".filter-input");
    const url = new URL(window.location.href);

    // Add change event listener to each input field
    filterInputs.forEach((input) => {
        input.addEventListener("change", (event) => {
            // Get the name of the input field that changed
            const inputName = event.target.name;
            const inputValue = event.target.value;
            url.searchParams.set(inputName, inputValue);
            window.location.href = url.toString();
        });
    });

    queries = url.searchParams;
    // loop through queries
    for (const [key, value] of queries) {
        // Find all inputs or selects with the same name
        const inputs = document.querySelectorAll(
            `input[name="${key}"], select[name="${key}"]`
        );

        // Loop through all found inputs and set their values
        inputs.forEach((input) => {
            console.log(key, value, input.tagName);
            if (input.tagName === "SELECT") {
                // Set the value for select elements
                input.value = value;
            } else {
                // Set the value for input elements
                input.value = value;
            }
        });
    }
};

function addMinutes(date, minutes) {
    return new Date(date.getTime() + minutes * 60000);
}

const viewReservationDetails = (id, data) => {
    const this_el = document.getElementById(id);

    $(this_el).addClass("flex");
    $(this_el).removeClass("hidden");
    const toDate = new Date(data.to_date);
    const newDate = addMinutes(toDate, 1);
    const formattedTime = newDate.toLocaleTimeString("en-US", {
        hour: "2-digit",
        minute: "2-digit",
    });

    const html = `<div class="flex flex-col">
                        <h2 class="text-xl font-bold">Reservation for <span class="text-accent">${
                            data.customer_name
                        }</span> for ${
        new Date(data.to_date).getHours() - new Date(data.from_date).getHours()
    }hrs - ${new Date(data.from_date).toDateString()} (${new Date(
        data.from_date
    ).toLocaleTimeString("en-us", {
        hour: "2-digit",
        minute: "2-digit",
    })} - ${formattedTime})</h2>
                        <p class="text- font-medium pt-5">Reservation Confirmed</p>
                        <div class="flex ">
                            <div
                                class="flex divide-x-2  border rounded-md border-accent/20 divide-accent/20 overflow-hidden">
                                <span class="px-4 py-1.5 ${
                                    data.status === "confirmed"
                                        ? "bg-accent text-white"
                                        : ""
                                }">Yes</span>
                                <span class="px-4 py-1.5 ${
                                    data.status !== "confirmed"
                                        ? "bg-accent text-white"
                                        : ""
                                }">No</span>
                            </div>
                        </div>
                        <div class="flex flex-col pt-10 gap-4">
                            <h6>Reservation Details</h6>
                            <div class="flex flex-col space-y-1.5 border rounded-xl px-3 py-3 border-accent/30">
                                <h2 class="flex gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                    </svg>

                                    ${new Date(data.created_at).toDateString()}
                                </h2>
                                <h2 class="flex gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                    </svg>
                                    ${data.customer_name}
                                </h2>
                                <h2 class="flex  gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                    </svg>
                                    ${data.customer_email}
                                </h2>
                                <h2 class="flex  gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                    </svg>
                                    ${data.customer_phone}
                                </h2>
                                <h2 class="flex  gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                    </svg>
                                    ${data.customer_address ?? ""}
                                </h2>
                            </div>
                        </div>
                        <div class="flex py-10">
                        <button class="bg-red-500 py-1 px-1 flex items-center space-x-2 shadow rounded text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                        </button>
                        </div>
                    </div>`;

    const injectable = document.getElementById("reservation-details");
    injectable.innerHTML = html;
};

$(document).ready(function () {
    listednDrag();
    handleFilterInput();
});
$(document).ready(function () {
    // Step 1: Retrieve the data from the data attribute
    var data = $("#data-container").data("reservations");

    // Parse the date and group data by 'date'
    var parseDate = d3.timeParse("%Y-%m-%d"); // Adjust format based on your date format
    data?.forEach(function (d) {
        d.date = parseDate(d.date);
    });

    // Grouping the data by date
    var groupedData = Array.from(
        d3.group(data, (d) => d.date),
        ([key, values]) => ({
            date: key,
            total_count: d3.sum(values, (d) => d.count),
            total_paid: d3.sum(values, (d) => d.paid_reservation),
            total_amount: d3.sum(values, (d) => d.amount),
        })
    );

    // Append 0 to dates in between which have no data
    var minDate = moment(d3.min(data, (d) => d.date));
    var maxDate = moment(d3.max(data, (d) => d.date));
    var date = minDate.clone(); // Clone the minDate to avoid mutating it

    // Create a set of existing dates for quick lookup
    const existingDates = new Set(groupedData.map((d) => d.date));

    // Loop through each date from minDate to maxDate
    while (date.isSameOrBefore(maxDate)) {
        const dateString = date.format("YYYY-MM-DD"); // Adjust format as needed
        if (!existingDates.has(dateString)) {
            groupedData.push({
                date: parseDate(dateString),
                total_count: 0,
                total_paid: 0,
                total_amount: 0,
            });
        }
        date.add(1, "days"); // Increment by one day
    }

    // Sort grouped data by date
    groupedData.sort((a, b) => new Date(a.date) - new Date(b.date));

    // Extract data for the chart
    var labels = groupedData.map((d) => d3.timeFormat("%Y-%m-%d")(d.date)); // Format date as labels
    var totalCounts = groupedData.map((d) => d.total_count);

    // Create the chart
    var ctx = document.getElementById("reservation-chart").getContext("2d");

    // Calculate height dynamically based on aspect ratio (if needed)
    var canvas = document.getElementById("reservation-chart");

    // Optional: You can define a fixed height or calculate based on aspect ratio
    var height = canvas.clientHeight;
    canvas.height = height;

    // Step 3: Create the chart
    new Chart(ctx, {
        type: "bar", // Bar chart type
        data: {
            labels: labels, // X-axis labels (dates)
            datasets: [
                {
                    label: "Total Reservations", // Dataset label
                    data: totalCounts, // Y-axis data (total_count)
                    backgroundColor: "rgba(54, 162, 235, 0.8)", // Bar fill color
                    borderColor: "rgba(54, 162, 235, 1)", // Bar border color
                    borderWidth: 1, // Bar border width
                },
            ],
        },
        options: {
            responsive: true, // Make chart responsive
            maintainAspectRatio: false, // Allow the chart to fill the canvas
            scales: {
                x: {
                    type: "category", // Change to category to handle string labels
                    title: {
                        display: true,
                        text: "Date", // X-axis label
                    },
                },
                y: {
                    beginAtZero: true, // Start y-axis at zero
                    title: {
                        display: true,
                        text: "Total Count", // Y-axis label
                    },
                },
            },
        },
    });

    var totalPaid = d3.sum(groupedData, (d) => d.total_paid);
    var totalCount = d3.sum(groupedData, (d) => d.total_count);
    var totalUnpaid = totalCount - totalPaid;

    // Data for the donut chart
    var donutData = {
        labels: ["Total Paid", "Total Unpaid"],
        datasets: [
            {
                data: [totalPaid, totalUnpaid],
                backgroundColor: [
                    "rgba(54, 162, 235, 0.6)", // Paid color
                    "rgba(255, 99, 132, 0.6)", // Unpaid color
                ],
                borderWidth: 1,
            },
        ],
    };

    // Step 3: Create the donut chart
    var ctx = document
        .getElementById("reservation-donut-chart")
        .getContext("2d");

    new Chart(ctx, {
        type: "doughnut", // Doughnut chart type
        data: donutData,
        options: {
            responsive: true,
            cutout: "90%",
            borderColor: "rgba(0, 0, 0, 0.1)",
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: "top",
                },
                tooltip: {
                    callbacks: {
                        label: function (tooltipItem) {
                            var label = tooltipItem.label || "";
                            if (label) {
                                label += ": ";
                            }
                            label +=
                                Math.round(tooltipItem.raw) +
                                " (" +
                                Math.round(
                                    (tooltipItem.raw / totalCount) * 100
                                ) +
                                "%)";
                            return label;
                        },
                    },
                },
            },
        },
    });

    const orderData = $("#orders-data-container").data("orders");

    // Extract data for the chart
    const orders_labels = orderData.map((d) => d.date); // X-axis labels (dates)
    const totalOrders = orderData.map((d) => d.total_orders); // Y-axis data (total_orders)

    // Replace with zero for dates with no data
    const minOrderDate = moment(d3.min(orderData, (d) => d.date));
    const maxOrderDate = moment(d3.max(orderData, (d) => d.date));

    const orderdate = minOrderDate.clone(); // Clone the minDate to avoid mutating it
    const existingOrderDates = new Set(orders_labels); // Create a Set for fast look-up
    console.log(existingOrderDates);

    while (orderdate.isSameOrBefore(maxOrderDate)) {
        const formattedDate = orderdate.format("YYYY-MM-DD"); // Format the date only once
        if (!existingOrderDates.has(formattedDate)) {
            orders_labels.push(formattedDate);
            totalOrders.push(0);
        }
        orderdate.add(1, "day");
    }

    // Create the chart
    const ctx_orders = document.getElementById("orders-chart").getContext("2d");

    // Set canvas height dynamically based on the aspect ratio
    const orders_canvas = document.getElementById("orders-chart");
    const orders_height = orders_canvas.clientHeight;
    orders_canvas.height = orders_height;

    new Chart(ctx_orders, {
        type: "line", // Line chart type
        data: {
            labels: orders_labels, // X-axis labels (dates)
            datasets: [
                {
                    label: "Total Orders", // Dataset label
                    data: totalOrders, // Y-axis data (total_orders)
                    backgroundColor: "transparent",
                    borderColor: "rgba(54, 162, 235, 1)", // Line color
                    borderWidth: 2, // Line width
                    fill: true, // Fill the area under the line
                    tension: 0.5, // Smoothness of the line
                },
            ],
        },
        options: {
            responsive: true, // Make chart responsive
            maintainAspectRatio: false, // Allow the chart to fill the canvas
            scales: {
                x: {
                    type: "category", // Use category for string labels
                    title: {
                        display: true,
                        text: "Date", // X-axis label
                    },
                },
                y: {
                    beginAtZero: true, // Start y-axis at zero
                    title: {
                        display: true,
                        text: "Total Orders", // Y-axis label
                    },
                },
            },
        },
    });
});

const unsubscribeNewsletter = (email, subscribed) => {
    const url = "/admin/newsletter-unsubscribe";
    headers = {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), // Add CSRF token to headers
        "Content-Type": "application/json",
    };
    fetch(url, {
        method: "POST",
        headers: headers,
        body: JSON.stringify({
            email: email,
            subscribed: subscribed,
        }),
    }).then((response) => {
        console.log(response);
    });

    window.location.href = "/admin/newsletter";
};
