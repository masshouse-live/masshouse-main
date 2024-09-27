const reservationData = {
    table_id: "2", // Assuming table ID is 1; adjust as needed
    from_time: "12:00", // Start time
    to_time: "14:00", // End time
    date: "2024-09-26", // Today's date
    customer_name: " Dwight Schrute", // Customer's name
    customer_email: "dwight@example.com", // Customer's email
    customer_phone: "123-456-7890", // Customer's phone
    customer_address:
        "(925) 261-93962410 Willow Pass Rd Pittsburg, California(CA), 94565",
};

const headers = {
    "Content-Type": "application/json",
    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"), // Add CSRF token to headers
};

fetch("/reserve-table", {
    method: "POST",
    headers: headers,
    body: JSON.stringify(reservationData),
})
    .then((response) => {
        if (response.ok) {
            return response.json(); // Parse JSON response
        }
        throw new Error("Network response was not ok.");
    })
    .then((data) => {
        console.log("Reservation successful:", data);
        console.log(
            `Reservation confirmed for ${data.customer_name} - ${data.date} (${data.from_time} - ${data.to_time})`
        );
    })
    .catch((error) => {
        console.error("Reservation failed:", error);
    });
