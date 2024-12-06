<x-admin>
    @section('title', 'Order Details')

    @section('content')
        <div class="container mt-4">
            <h1 class="mb-4">Order Details - #{{ $order->id }}</h1>

            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Order Information</h5>
                </div>
                <div class="card-body">
                    <p><strong>User:</strong> {{ $order->user->name ?? 'Guest' }}</p>
                    <p><strong>Name:</strong> {{ $order->name }}</p>
                    <p><strong>Address:</strong> {{ $order->address }}</p>
                    <p><strong>Mobile Number:</strong> {{ $order->mobile_number }}</p>
                    <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
                    <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
                </div>
            </div>

            <h2 class="mb-3">Order Items</h2>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderItems as $item)
                            <tr>
                                <td>{{ $item->product->name ?? 'Product not found' }}</td>
                                <td>
                                <img src="{{ asset('images/' . $item->product->image) }}" alt="{{ $item->product->name }}" style="width: 50px;">
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td> ₹{{ number_format($item->price, 2) }}</td>
                                <td> ₹{{ number_format($item->quantity * $item->price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
</x-admin>
