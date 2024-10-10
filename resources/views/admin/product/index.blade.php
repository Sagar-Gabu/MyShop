<x-admin>
    @section('title', 'Products')
    <a href="{{ route('admin.product.create') }}" class="btn btn-primary float-end mb-5">Create</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Cat</th>
                <th scope="col">Subcat</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td><img height="50" src="{{ asset('images/'.$product->image) }}" alt="{{ $product->name }}"></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ optional($product->category)->name }}</td>
                <td>{{ optional($product->subcategory)->name }}</td>
                <td>
                    <a href="{{ route('admin.product.edit', $product) }}" class="btn btn-success">Edit</a>

                    <!-- <form action="{{ route('admin.product.destroy', $product) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf -->
                    <button class="btn btn-danger deletebtn" type="submit" data-id="{{ $product->id }}" data-url="{{ route('admin.product.destroy', $product->id) }}">Delete</button>
                </td>
                <!-- </form> -->
                </td>
            </tr>


            @empty
            <tr>
                <th class="bg-danger text-center text-white" colspan="8">No products.</th>
            </tr>

            @endforelse


        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(".deletebtn").on('click', function() {
            let url = $(this).data('url');
            let id = $(this).data('id');

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    _method: 'DELETE',
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {

                    $("#product-row-" + id).remove();

                },

            });
        });
    </script>
</x-admin>