<x-admin>

    @section('title','Category Edit')
    <form id="categoryForm" method="POST" class="needs-validation" novalidate>
        @method('PUT')
        @csrf
        <div class="form-group mb-3">
            <label for="name" class="form-label">Edit category</label>
            <a href="{{ route('admin.category.index') }}" class="btn btn-sm btn-primary float-end mb-5">Back</a>

            <input value="{{ $category->name }}" type="text" name="name" id="name" class="form-control">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mb-3">
            <button class="btn btn-primary" id="submitBtn" type="button">Save</button>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#submitBtn').click(function(e) {
                e.preventDefault();
                
                let formData = {
                    _token: "{{ csrf_token() }}",
                    _method: "PUT",
                    name: $('#name').val(),
                };

                $.ajax({
                    url: "{{ route('admin.category.update', $category->id) }}",
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        alert('Category updated successfully');
                    },
                    
                });
            });
        });
    </script>

</x-admin>
