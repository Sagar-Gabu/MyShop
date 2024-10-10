<x-admin>
    @section('title', 'Category Create')
    <div>
        <div class="text-black">
            <h4 class="mb-0">Create SubCategory</h4>
        </div>
        <form action="{{ route('admin.subcategory.store') }}" method="POST" id="create" class="needs-validation" novalidate>
            @csrf
            <a href="{{ route('admin.subcategory.index') }}" class="btn btn-sm btn-primary float-end mb-5">Back</a>

            <div class="form-group mb-3">
                <label for="name" class="form-label">Name</label>
                <input value="{{ old('name') }}" type="text" name="name" id="name" class="form-control" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="category" class="form-label">Select category</label>
                <select name="category" id="category" class="form-control" required>
                    <option value="" selected disabled>Select category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        function ajaxCall() {
            $.ajax({
                url: "{{ route('admin.subcategory.index') }}",
                method: "GET",
                success: function(response) {
                    $(".showdiv").html(response);
                }
            });
        }

        $$("#create").on('submit', function(e) {
    e.preventDefault();

    let name = $("#name").val();
    let category = $("#category").val();

    $.ajax({
        url: "{{ route('admin.subcategory.store') }}",
        method: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            "name": name,
            "category": category,
        },
        success: function(response) {
            $('#name').val(""); 
            $('#category').val("");
            $(".showdiv").html(response); 
        },
        
    });
});
    </script>
</x-admin>
 