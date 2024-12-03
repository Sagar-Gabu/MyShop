<x-site>
    @section('title', 'Your Cart')
    <section class="sec-cart bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-b-30">
                    <h3 class="mtext-105 cl2 p-b-30">Your Cart</h3>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartItems as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset('images/' . $item->product->image) }}" alt="Product" style="width: 50px;">
                                        {{ $item->product->name }}
                                    </td>
                                    <td>&#8377;{{ number_format($item->product->price, 2) }}</td>
                                    <td>
                                        <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display: flex; align-items: center; gap: 10px;">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control" style="width: 60px;">
                                            <button type="submit" class="btn btn-update" style="border: none; background: none;">
                                                <i class="fas fa-sync-alt" style="color: #007bff; cursor: pointer;"></i>
                                            </button>
                                        </form>
                                    </td>

                                    <td>&#8377;{{ number_format($item->product->price * $item->quantity, 2) }}</td>
                                    <td>
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="total-cart">
                            <p><strong>Total: </strong>&#8377;{{ number_format($cartItems->sum(function($item) { return $item->product->price * $item->quantity; }), 2) }}</p>
                        </div>
                        <div class="checkout">
                            <a href="" class="btn btn-primary">Proceed to Checkout</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-site>