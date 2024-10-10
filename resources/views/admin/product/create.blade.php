<x-admin>
    @section('title','Products create')

    <div class="card-body mt-5">
        <form action="{{ route('admin.product.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" class="form-control">
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control">
            </div>

            <!-- Category Select -->
            <div class="form-group mb-3">
                <label for="category">Category</label>
                <select name="category_id" id="category" class="form-control">
                    <option value="" selected disabled>Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Subcategory Select (Populated via AJAX) -->
            <div class="form-group mb-3">
                <label for="subcategory">SubCategory</label>
                <select name="sub_category_id" id="subcategory" class="form-control">
                    <option value="" selected disabled>Select a subcategory</option>
                </select>
            </div>

            <!-- Image Upload -->
            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <!-- Submit Button -->
            <div class="form-group">
                <button class="btn btn-primary" type="submit" id="submit">Save</button>
            </div>
        </form>
    </div>

    <!-- jQuery and AJAX Script for Dynamic Subcategory Loading -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script>
        $("#category").on('change', function() {
            let categoryId = $(this).val();
            $("#submit").attr('disabled', 'disabled');
            $("#submit").html('Please wait...');

            // AJAX request to fetch subcategories based on selected category
            $.ajax({
                url: "{{ route('admin.getsubcategory') }}", // Route to fetch subcategories
                type: 'GET',
                data: {
                    category_id: categoryId, // Send category ID to server
                },
                success: function(data) {
                    $("#submit").removeAttr('disabled');
                    $("#submit").html('Save');

                    // Populate the subcategory select element with new options
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
