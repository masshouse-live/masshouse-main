const reservationData = {
    table_id: "1", // Assuming table ID is 1; adjust as needed
    from_time: "08:00", // Start time
    to_time: "11:00", // End time
    date: new Date().toISOString().split("T")[0], // Today's date
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

const orderData = {
    name: "John Doe",
    email: "john.doe@example.com",
    phone: "123-456-7890",
    address: "123 Main Street",
    city: "New York",
    state: "NY",
    zip: "10001",
    products: [
        {
            product_id: 1,
            quantity: 3,
            color: "red",
            size: "M",
        },
        {
            product_id: 2,
            quantity: 1,
            color: "blue",
            size: "L",
        },
    ],
};

async function submitOrder() {
    try {
        const response = await fetch("/create-order", {
            method: "POST",
            headers: headers,
            body: JSON.stringify(orderData),
        });

        if (response.ok) {
            // Order placed successfully, redirect to the orders placed route
            window.location.href = "/orders-placed";
        } else {
            // Handle error
            const errorData = await response.json();
            console.log("Error placing order:", errorData);
        }
    } catch (error) {
        console.error("Error submitting order:", error);
    }
}

// Call the function to submit the order
submitOrder();
