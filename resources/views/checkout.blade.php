@extends('layouts.app')
@section('title', 'Checkout')
@section('content')
    <section class="checkout">
        <div class="row checkout-wrapper">
            <div class="check-left col-lg-8 col-md-6 col-sm-12">
                <h4>SHOPPING CART</h4>
                <br>
                <div class="table-responsive">
                    <table style="background: black !important; color:white !important; width:100%;">
                        <thead style="padding:24px;">
                            <tr class='text-center' style="padding:24px !important; background: black !important;">
                                <th class="bg-dark text-light">PRODUCT</th>
                                <th class="bg-dark text-light">SIZE</th>
                                <th class="bg-dark text-light">COLOR</th>
                                <th class="bg-dark text-light">QUANTITY</th>
                                <th class="bg-dark text-light">TOTAL PRICE</th>

                            </tr>
                        </thead>
                        <tbody style="background: black; color: white; padding: 24px;">
                            @foreach ($cart as $item)
                                <tr class="cart-item text-center" style="background: black; color: white;">
                                    <td style="padding: 10px;">
                                        <img style="width: 30px; height: 30px; border: 1px solid white;" class="product-img"
                                            src="{{ asset($item['image']) }}" alt="product">
                                        <span style="margin-left: 10px;">{{ $item['name'] }}</span>
                                    </td>
                                    <td>
                                        <select id="size-{{ $item['id'] }}" name="size" class="size-select"
                                            data-id="{{ $item['id'] }}"
                                            style="background: black; color: white; border: 1px solid white; padding: 5px; border-radius: 5px;">
                                            <option>-- Select --</option>
                                            @foreach (explode(',', $item['sizes']) as $size)
                                                <option @if (trim($size) == trim($item['size'])) selected @endif
                                                    value="{{ trim($size) }}">
                                                    {{ trim($size) }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select id="color-{{ $item['id'] }}" data-id="{{ $item['id'] }}"
                                            class="color-select" name="color"
                                            style="background: black; color: white; border: 1px solid white; padding: 5px; border-radius: 5px;">
                                            <!-- Color options -->
                                            <option>-- Select --</option>
                                            @foreach (explode(',', $item['colors']) as $color)
                                                <option @if (trim($color) == trim($item['color'])) selected @endif
                                                    value="{{ trim($color) }}">
                                                    {{ trim($color) }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center" style="gap: 10px;">
                                            <i class="fa-solid fa-minus" data-id="{{ $item['id'] }}"
                                                style="cursor: pointer;"></i>
                                            <span id="quantity-{{ $item['id'] }}"
                                                class="item-quantity">{{ $item['quantity'] }}</span>
                                            <i class="fa-solid fa-plus" data-id="{{ $item['id'] }}"
                                                style="cursor: pointer;"></i>
                                        </div>
                                    </td>
                                    <td id="total-{{ $item['id'] }}" class="item-price"
                                        data-price="{{ $item['price'] }}">
                                        KSH {{ number_format($item['quantity'] * $item['price'], 2, '.', ',') }}
                                    </td>
                                    <td>
                                        <a href="" style="color: white;"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                @php
                    $total = 0;
                    foreach ($cart as $item) {
                        $total += $item['price'] * $item['quantity'];
                    }
                @endphp

                <br><br><br><br>
                <div class="subtotal">
                    <p>Subtotal: &nbsp;<span class="subtotal_amount">KSH {{ number_format($total, 2, '.', ',') }}</span>
                    </p>
                    <p>Shipping: &nbsp;<span>Free</span></p>
                </div>
                <br><br><br><br><br>
                <div class="total">
                    <div class="row total-wrapper">
                        <div class="tt-left col-lg-7 col-md-6 col-sm-12">
                            <a href="merch.html">
                                < &nbsp; CONTINUE SHOPPING</a>
                        </div>
                        <div class="tt-right col-lg-5 col-md-6 col-sm-12 ">
                            <p>Total: &nbsp;&nbsp;&nbsp;&nbsp;<span class="subtotal_amount">KSH
                                    {{ number_format($total, 2, '.', ',') }}</span></p>
                        </div>
                    </div>
                </div>


            </div>
            <form id="multi-step-form" class="check-right col-lg-4 col-md-6 col-sm-12" style="overflow: auto" method="post"
                action="{{ route('cart.create_order') }}">
                @csrf

                <!-- Step 1: User Info -->
                <div id="step-1" class="step">
                    <h4>SHIPPING INFO</h4>
                    <br>
                    <br>
                    <div class="form-outline mb-4">
                        <input type="text" id="name" class="form-control grey" placeholder="Your Name" required
                            name="name">
                    </div>

                    <div class="form-outline mb-4">
                        <input type="email" id="email" class="form-control grey" placeholder="Your Email" required
                            name="email">
                    </div>

                    <div class="form-outline mb-4">
                        <input type="tel" id="phone" class="form-control grey" placeholder="Your Phone" required
                            name="phone">
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="address" class="form-control grey" placeholder="Your Address" required
                            name="address">
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="city" class="form-control grey" placeholder="City" required
                            name="city">
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="state" class="form-control grey" placeholder="State/County" required
                            name="state">
                    </div>

                    <div class="form-outline mb-4">
                        <input type="text" id="zip" class="form-control grey" placeholder="Zip Code" required
                            name="zip">
                    </div>

                    <br>
                    <button type="button" class="button1" id="next-step">Next</button>
                </div>

                <!-- Step 2: Payment Info -->
                <div id="step-2" class="step" style="display: none;">
                    <h4>PAYMENT INFO</h4>
                    <br>
                    <label>Payment Method:</label>
                    <br>
                    <div class="d-flex">
                        <div>
                            <input checked required class="form-check-input rounded-0 mpesa-check" type="checkbox"
                                id="mpesa" name="mpesa">
                            &nbsp;
                        </div>
                        <div>
                            <img src="{{ asset('images/logos/mpesa.png') }}" alt="mpesa">
                        </div>
                    </div>

                    <br>
                    <label>Mpesa Number:</label>
                    <br>
                    <div class="form-outline mb-4 col-lg-6 col-md-6 col-md-12">
                        <input type="tel" id="payment-phone" class="form-control grey" placeholder="Mpesa Number"
                            autocomplete="off" required="required" name="payment_phone">
                    </div>
                    <br><br>
                    <div class="form-outline mb-4 col-lg-6 col-md-6 col-md-12">
                        <input type="checkbox" id="terms" name="terms">
                        <label for="terms">I agree to the
                            <a href="{{ route('delivery-policy') }}">delivery policy</a> and
                            <a href="{{ route('return-policy') }}">return policy</a>
                        </label>
                    </div>
                    <br><br>
                    <button class="button1" type="submit">CHECKOUT</button>
                </div>
            </form>

        </div>
    </section>

    <style>
        .check-left {
            color: white
        }

        .check-right {
            background-color: black;
            color: white;
            border: 1px solid white;
            border-radius: 0px;
        }

        .form-control {
            background-color: black !important;
            border: 1px solid white !important;
        }

        .button1 {
            background-color: white;
            color: black;
            border: 1px solid white;
            border-radius: 0px;
            padding: 5px 30px 5px 30px;
        }

        .cart-item {
            transition: background-color 0.3s ease;
        }

        .cart-item:hover {
            background-color: #333;
            /* Darker background on hover */
        }

        select {
            appearance: none;
            /* Remove default dropdown arrow */
            background: black;
            color: white;
            border: 1px solid white;
            padding: 5px;
            border-radius: 5px;
            cursor: pointer;
        }

        select:focus {
            outline: none;
            /* Remove default outline */
            border-color: #007bff;
            /* Change border color on focus */
        }

        .fa-minus,
        .fa-plus {
            font-size: 20px;
            /* Icon size */
            color: white;
            transition: color 0.3s ease;
        }

        .fa-minus:hover,
        .fa-plus:hover {
            color: #007bff;
            /* Change color on hover */
        }
    </style>
    <script>
        // Function to handle increment
        function incrementQuantity(productId) {
            const headers = {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            };

            fetch("{{ route('cart.increment') }}", {
                    method: "POST",
                    headers: headers,
                    body: JSON.stringify({
                        "product_id": `${productId}`
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.cart) {
                        // Update the cart view (quantity, total, etc.)
                        updateCartView(data.cart);
                    }
                });
        }

        // Function to handle decrement
        function decrementQuantity(productId) {
            const headers = {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            };
            console.log(headers)

            fetch("{{ route('cart.decrement') }}", {
                    method: "POST",
                    headers: headers,
                    body: JSON.stringify({
                        "product_id": `${productId}`
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.cart) {
                        // Update the cart view (quantity, total, etc.)
                        updateCartView(data.cart);
                    }
                });
        }

        // Function to update cart view dynamically
        function updateCartView(cart) {
            // Iterate over the cart object
            Object.values(cart).forEach(function(item) {
                // Update the quantity and total for each item in the cart view
                $('#quantity-' + item.id).text(item.quantity);
                //format as KSH. 24,500.00 currency is KES
                const amount = Number(item.price * item.quantity).toLocaleString('en-US', {
                    style: 'currency',
                    currency: 'KES',
                    minimumFractionDigits: 2
                })
                $('#total-' + item.id).text(amount);
            });

            updateSubtotal(cart);
        }

        // Example function to update the subtotal
        function updateSubtotal(cart) {
            let subtotal = 0;

            Object.values(cart).forEach(function(item) {
                subtotal += item.price * item.quantity;
            });

            $('.subtotal_amount').text(Number(subtotal).toLocaleString('en-US', {
                style: 'currency',
                currency: 'KES',
                minimumFractionDigits: 2
            }));
        }

        const colorChange = (id, color) => {
            fetch("{{ route('cart.color-change') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        "product_id": `${id}`,
                        "color": `${color}`
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.cart) {
                        // Update the cart view (quantity, total, etc.)
                        updateCartView(data.cart);
                    }
                });
        }

        const sizeChange = (id, size) => {
            fetch("{{ route('cart.size-change') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        "product_id": `${id}`,
                        "size": `${size}`
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.cart) {
                        // Update the cart view (quantity, total, etc.)
                        updateCartView(data.cart);
                    }
                });
        }

        // listen submit payment-form
        $('#payment-form').submit(function(e) {
            e.preventDefault();

            const formData = $(this).serialize();
            const url = $(this).attr('action');
            // submit using ajax
            fetch(url, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: formData
            }).then((response) => {
                console.log(response);
            }).catch((error) => {

            })
        });

        // Attach event listeners to plus and minus buttons
        $('.fa-plus').on('click', function() {
            let productId = $(this).data('id');
            console.log(productId)
            incrementQuantity(productId);
        });

        $('.fa-minus').on('click', function() {
            let productId = $(this).data('id');
            decrementQuantity(productId);
        });

        // color change
        $('.color-select').on('change', function() {
            let productId = $(this).data('id');
            let color = $(this).val();
            colorChange(productId, color);
        });

        // size change
        $('.size-select').on('change', function() {
            let productId = $(this).data('id');
            let size = $(this).val();
            sizeChange(productId, size);
        });
        document.getElementById('next-step').addEventListener('click', function() {
            // Hide step 1 (user info) and show step 2 (payment info)
            // make sure all fields are valid
            inputs = document.getElementById('step-1').querySelectorAll('.form-control, .form-select');
            for (let i = 0; i < inputs.length; i++) {
                if (!inputs[i].checkValidity()) {
                    inputs[i].classList.add('is-invalid');
                    inputs[i].classList.remove('is-valid');
                } else {
                    inputs[i].classList.add('is-valid');
                    inputs[i].classList.remove('is-invalid');
                }
            }

            for (let i = 0; i < inputs.length; i++) {
                if (!inputs[i].checkValidity()) {
                    return;
                }
            }
            document.getElementById('step-1').style.display = 'none';
            document.getElementById('step-2').style.display = 'block';
        });
    </script>
@endsection
