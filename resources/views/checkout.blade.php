@extends('layouts.app')

@section('content')
    <section class="checkout">
        <div class="row checkout-wrapper">
            <div class="check-left col-lg-8 col-md-6 col-sm-12">
                <h4>SHOPPING CART</h4>
                <br>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class='text-center'>
                                <th class="bg-dark text-light">PRODUCT</th>
                                <th class="bg-dark text-light">SIZE</th>
                                <th class="bg-dark text-light">QUANTITY</th>
                                <th class="bg-dark text-light">TOTAL PRICE</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                                <tr class="cart-item text-center">
                                    <td><img class="product-img" src="{{ asset($item['image']) }}" alt="product"></td>
                                    <td>
                                        <select name="size">
                                            <!-- Size options -->
                                        </select>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <i class="fa-solid fa-minus" data-id="{{ $item['id'] }}"></i>
                                            <span id="quantity-{{ $item['id'] }}"
                                                class="item-quantity">{{ $item['quantity'] }}</span>
                                            <i class="fa-solid fa-plus" data-id="{{ $item['id'] }}"></i>
                                        </div>
                                    </td>
                                    <td id="total-{{ $item['id'] }}" class="item-price" data-price="{{ $item['price'] }}">
                                        KSH. {{ $item['quantity'] * $item['price'] }}
                                    </td>
                                    <td>
                                        <a href=""><i class="fa-solid fa-trash text-dark"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>



                <br><br><br><br>
                <div class="subtotal">
                    <p>Subtotal: &nbsp;<span>KSH. 2,600</span></p>
                    <p>Shipping: &nbsp;<span>Free</span></p>
                </div>
                <br><br><br><br><br>
                <div class="total">
                    <div class="row total-wrapper">
                        <div class="tt-left col-lg-7 col-md-6 col-sm-12">
                            <a href="merch.html">
                                < &nbsp; CONTINUE SHOPPING</a>
                        </div>
                        <div class="tt-right col-lg-5 col-md-6 col-sm-12">
                            <p>Total: &nbsp;&nbsp;&nbsp;&nbsp;<span>KSH. 2,600</span></p>
                        </div>
                    </div>
                </div>


            </div>
            <div class="check-right col-lg-4 col-md-6 col-sm-12">


                <h4>PAYMENT INFO</h4>
                <br>
                <label>Payment Method:</label>
                <br>
                <div class="d-flex">
                    <div>
                        <input checked class="form-check-input rounded-0 mpesa-check" type="checkbox" id="mpesa"
                            name="mpesa">
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
                    <input type="tel" id="phone" class="form-control grey" placeholder="Mpesa Number"
                        autocomplete="off" required="required" name="phone">
                </div>
                <br><br><br>

                <button class="button1 ">CHECKOUT</button>

            </div>
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
    </style>
    <script>
        // Function to handle increment
        function incrementQuantity(productId) {
            $.ajax({
                url: "{{ route('cart.increment') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId
                },
                success: function(response) {
                    if (response.success) {
                        // Update the cart view (quantity, total, etc.)
                        updateCartView(response.cart);
                    }
                }
            });
        }

        // Function to handle decrement
        function decrementQuantity(productId) {
            $.ajax({
                url: "{{ route('cart.decrement') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId
                },
                success: function(response) {
                    if (response.success) {
                        // Update the cart view (quantity, total, etc.)
                        updateCartView(response.cart);
                    }
                }
            });
        }

        // Function to update cart view dynamically
        function updateCartView(cart) {
            cart.forEach(function(item, index) {
                $('#quantity-' + item.id).text(item.quantity);
                $('#total-' + item.id).text(item.quantity * item.price);
            });

            // Update subtotal, etc.
            updateSubtotal();
        }

        // Example function to update the subtotal
        function updateSubtotal() {
            let subtotal = 0;
            $('.cart-item').each(function() {
                let price = $(this).find('.item-price').data('price');
                let quantity = $(this).find('.item-quantity').text();
                subtotal += price * quantity;
            });

            $('#subtotal').text('KSH. ' + subtotal);
        }

        // Attach event listeners to plus and minus buttons
        $('.fa-plus').on('click', function() {
            let productId = $(this).data('id');
            incrementQuantity(productId);
        });

        $('.fa-minus').on('click', function() {
            let productId = $(this).data('id');
            decrementQuantity(productId);
        });
    </script>
@endsection
