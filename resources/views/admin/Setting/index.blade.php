<x-admin>
    @section('title', 'Site Settings')

    <div class="card">
        <div class="card-header">
            <h5>Update Site Settings</h5>
        </div>
        <div class="card-body">
            <div id="alert-msg"></div>
            <form id="settingsForm" action="{{ route('admin.setting.update') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $setting->id }}">
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $setting->email }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $setting->phone }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="insta">Instagram</label>
                        <input type="url" class="form-control" name="insta" id="insta" value="{{ $setting->insta }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="facebook">Facebook</label>
                        <input type="url" class="form-control" name="facebook" id="facebook" value="{{ $setting->facebook }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="youtube">YouTube</label>
                        <input type="url" class="form-control" name="youtube" id="youtube" value="{{ $setting->youtube }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="twitter">Twitter</label>
                        <input type="url" class="form-control" name="twitter" id="twitter" value="{{ $setting->twitter }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{ $setting->address }}" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="map">Map URL</label>
                        <input type="text" class="form-control" name="map" id="map" value="{{ $setting->map }}">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <button class="btn btn-primary" type="submit">Save Settings</button>
                </div>
            </form>
        </div>
    </div>

    @section('ajax')
        <script>
            $(document).ready(function() {
                $('#settingsForm').on('submit', function(e) {
                    e.preventDefault();

                    var formData = $(this).serialize();

                    $.ajax({
                        url: "{{ route('admin.setting.update') }}",
                        method: "POST",
                        data: formData,
                        success: function(response) {
                            $('#alert-msg').html('<div class="alert alert-success">Settings saved successfully</div>');
                        },
                        
                    });
                });
            });
        </script>
    @endsection

</x-admin>
