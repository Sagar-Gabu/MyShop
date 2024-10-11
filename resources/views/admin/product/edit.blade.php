<x-admin>
    @section('title', 'Product Edit')

    <div class="form-group mb-3">
        <form action="{{ route('admin.product.update', $product->id) }}" enctype="multipart/form-data" method="POST">
            @method('PUT')
            @csrf

            <input type="hidden" name="id" value="{{ $product->id }}">
            
            <div class="form-group mt-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
            </div>

            <div class="form-group mt-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ $product->price }}">
            </div>

            <div class="form-group mt-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" class="form-control" value="{{ $product->description }}">
            </div>

            <div class="form-group mb-3">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control">
                    <option value="" selected disabled>Select a category</option>
                    @foreach($categories as $category)
                        <option {{ $product->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="subcategory">SubCategory</label>
                <select name="sub_category_id" id="subcategory" class="form-control">
                    <option value="" selected disabled>Select a subcategory</option>
                    @foreach ($subcategories as $item)
                        <option {{ $product->sub_category_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="Image">Image</label>
                <input type="file" name="image" id="Image" class="form-control">
            </div>

            <div class="form-group mt-3">
                <button class="btn btn-sm btn-primary">Save</button>
            </div>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script>
        $("#category").on('change', function() {
            let categoryId = $(this).val();
            $("#submit").attr('disabled', 'disabled');
            $("#submit").html('Please wait...');

            
            $.ajax({
                url: "{{ route('admin.getsubcategory') }}",
                type: 'GET',
                data: { category_id: categoryId }, 
                success: function(data) {
                    $("#submit").removeAttr('disabled');
                    $("#submit").html('Save');

                    
                    if (data) {
                        let options = '<option value="" disabled selected>Select a subcategory</option>';
                        $.each(data, function(key, subcategory) {
                            options += `<option value="${subcategory.id}">${subcategory.name}</option>`;
                        });
                        $("#subcategory").html(options);
                    }
                }
            });
        });
    </script>

</x-admin>
