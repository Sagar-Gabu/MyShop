<x-admin>
    @section('title','Category Create')
    <form action="{{ route('admin.category.store') }}" method="POST" id="create" class="needs-validation" novalidate>
        @csrf
        <a href="{{ route('admin.category.index') }}" class="btn btn-sm btn-primary float-end mb-5">Back</a>

        <div class="form-group mb-3">
            <label for="name" class="form-label">Name</label>
            <input value="{{ old('name') }}" type="text" name="name" id="name" class="form-control">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mb-3">
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        function ajaxCall() {
            $.ajax({
                url: "{{route('admin.category.index')}}",
                method: "GET",
                data: {},
                success: function(response) {
                    $(".showdiv").html("");
                    $(".showdiv").html(response);
                }
            });
        }
        ajaxCall();
        $("#create").on('submit', function(e) {
            e.preventDefault();
            let name = $("#name").val();
            $.ajax({
                url: "{{route('admin.category.store')}}",
                method: "POST",
                data: {
                    "_token": "{{csrf_token()}}",
                    "name": name,
                },
                success: function(response) {
                     
                        $('#name').val("");
                        
                    
                    ajaxCall();
                }
            });
        });
    </script>
    
</x-admin>
