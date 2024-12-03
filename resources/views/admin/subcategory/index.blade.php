<x-admin>
    @section('title','Subcategories')
    <a href="{{ route('admin.subcategory.create') }}" class="btn btn-primary float-end mb-5">Create</a>

    <table class="table table-striped" id="subcategoryTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $subcat)
            <tr>
                <td>{{ $subcat->name }}</td>
                <td>{{ $subcat->slug}}</td>
                <td>{{ $subcat->category->name }}</td>
            
                <td>
                    <a href="{{ route('admin.subcategory.edit', encrypt($subcat->id)) }}" class="btn btn-sm btn-primary">Edit</a>

                    <form action="{{ route('admin.subcategory.destroy', encrypt($subcat->id)) }}" method="POST" class="deleteForm d-inline" data-id="{{ $subcat->id }}">
                        @method('DELETE')
                        @csrf
                        <button type="button" class="btn btn-sm btn-danger deleteBtn" data-id="{{ $subcat->id }}">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <th class="bg-danger text-center text-white" colspan="4">No Subcategories.</th>
            </tr>
            @endforelse
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>

    $(function() {
        $('#subcategoryTable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "responsive": true,
        });
    });


    $(document).on('click', '.deleteBtn', function(e) {
        e.preventDefault();

        var form = $(this).closest('form');
        var url = form.attr('action');

        if (confirm('Are you sure you want to delete this subcategory?')) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    form.closest('tr').remove(); // Remove the row
                }
            });
        }
    });
</script>

</x-admin>
