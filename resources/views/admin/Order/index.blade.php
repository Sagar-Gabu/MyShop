<x-admin>
    @section('title', 'Orders')

    @section('content') <!-- Start content section -->
        <h1 class="mb-4">Orders List</h1>
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User Name</th>
                    <th>Total</th>
                    <th>Payment Method</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name ?? 'N/A' }}</td> <!-- Assuming 'user' relation exists -->
                        <td>{{ $order->total }}</td>
                        <td>{{ $order->payment_method }}</td>
                        <td>{{ $order->status ?? 'Pending' }}</td> <!-- Assuming 'status' exists -->
                        <td>
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    @endpush
</x-admin>
