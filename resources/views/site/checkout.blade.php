<x-site>
    @section('title', 'Checkout')

    <section class="sec-checkout bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <!-- Left Column: Cart Details -->
                <div class="col-md-8">
                    <h3 class="mtext-105 cl2 p-b-30">Your Cart</h3>

                    <!-- Check if cart is empty -->
                    @if($cartItems->isEmpty())
                    <p>Your cart is empty.</p>
                    @else
                    <div class="table-cart">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $item)
                                <tr>
                                    <td>
                                        <!-- Product Image and Name -->
                                        <img src="{{ asset('images/' . $item->product->image) }}" alt="{{ $item->product->name }}" style="width: 50px;">
                                        {{ $item->product->name }}
                                    </td>
                                    <td>&#8377;{{ number_format($item->product->price, 2) }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>&#8377;{{ number_format($item->product->price * $item->quantity, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Total Cart Amount -->
                        <div class="total-cart">
                            <p><strong>Total: </strong>&#8377;{{ number_format(collect($cartItems)->sum(function ($item) { return $item->product->price * $item->quantity; }), 2) }}</p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Right Column: Checkout Form -->
                <div class="col-md-4">
                    <h3 class="mtext-105 cl2 p-b-30">Checkout</h3>

                    <!-- Checkout Form -->
                    <form action="{{ route('site.processCheckout') }}" method="POST">
                        @csrf

                        <!-- Receiver Name -->
                        <div class="form-group">
                            <label for="name">Receiver Name</label>
                            <input name="name" id="name" class="form-control" required>
                        </div>

                        <!-- Shipping Address -->
                        <div class="form-group">
                            <label for="address">Shipping Address</label>
                            <textarea name="address" id="address" class="form-control" required></textarea>
                        </div>

                        <!-- Mobile Number -->
                        <div class="form-group">
                            <label for="mobile_number">Mobile Number</label>
                            <input type="text" name="mobile_number" id="mobile_number" class="form-control" required pattern="\d{10}" placeholder="Enter your mobile number" />
                        </div>

                        <!-- Payment Method -->
                        <div class="form-group">
                            <label for="payment_method">Payment Method</label>
                            <select name="payment_method" id="payment_method" class="form-control" required>
                                <option value="credit_card">Credit Card</option>
                                <option value="paypal">PayPal</option>
                                <option value="cash_on_delivery">Cash on Delivery</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button class="btn btn-primary" type="submit">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-site>
