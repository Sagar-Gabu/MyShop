<x-admin>
    @section('title', 'Edit Subcategory')

    <h1>Edit Subcategory</h1>

    <form id="editSubcategoryForm" method="POST" action="{{ route('admin.subcategory.update', encrypt($data->id)) }}">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $data->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#editSubcategoryForm').on('submit', function(e) {
                e.preventDefault(); 

                $.ajax({
                    url: $(this).attr('action'), 
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        
                        alert('Subcategory updated successfully!');
                        window.location.href = "{{ route('admin.subcategory.index') }}"; 
                    },
                    
                });
            });
        });
    </script>
</x-admin>
