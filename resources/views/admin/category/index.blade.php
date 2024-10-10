<x-admin>
    @section('title','Categories')
    <a href="{{ route('admin.category.create') }}" class="btn btn-primary float-end mb-5">Create</a>
    <table class="table  table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
            <tr id="category-row-{{ $category->id }}">
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-success">Edit</a>
                    <button class="btn btn-danger deletebtn" type="button" data-id="{{ $category->id }}" data-url="{{ route('admin.category.destroy', $category->id) }}">Delete</button>
                </td>
            </tr>
            @empty
            <tr>
                <th class="bg-danger text-center text-white" colspan="3">No categories.</th>
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
                    
                        $("#category-row-" + id).remove();
                        
                    },
                    
                });
            }
        );
    </script>
</x-admin>
