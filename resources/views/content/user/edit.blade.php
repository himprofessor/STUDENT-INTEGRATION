@extends('layouts/contentNavbarLayout')

@section('title', 'User Card - UI elements')
<!-- crop image  -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('vendor-script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('page-script')
<script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold">User Update</h5>
</div>
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
            <form method="POST" action="{{ url('/user/edit', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('content.user.form', ['user' => $user])
                    <br>
                    <a href="{{ url('user') }}" class="btn btn-secondary me-1">Cancel</a>
                    <button type="submit" class="btn" style="background-color: #009DE1; color:white">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Initialize Croppie

        var croppie = new Croppie(document.getElementById('croppie-container'), {
            viewport: {
                width: 150,
                height: 150,
                type: 'circle'
            },
            boundary: {
                width: 200,
                height: 200
            },
        });

        // Handle file input change
        $('#upload').on('change', function() {
            console.log(1);
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    // Bind image to Croppie
                    croppie.bind({
                        url: e.target.result
                    });
                    // Open cropping modal
                    $('#crop-modal').modal('show');
                };
                reader.readAsDataURL(input.files[0]);
                document.getElementById('img').style.display = 'none'
                document.getElementById('croppie-container').style.display = 'block';
                document.getElementById('crop-button').style.display = 'block';



            }
        });

        // Handle crop button click
        $('#crop-button').on('click', function() {
            // Get cropped image data
            croppie.result('base64').then(function(base64) {
                // Set the value of the hidden input
                $('#cropped-image').val(base64);

                // You can also display the cropped image if needed
                $('#uploadedAvatar').attr('src', base64);

                // Close the cropping modal
                $('#crop-modal').modal('hide');
                document.getElementById('croppie-container').style.display = 'none';
                document.getElementById('crop-button').style.display = 'none';
                document.getElementById('img').style.display = 'block';
            });
        });

        // Close modal event
        $('#crop-modal').on('hidden.bs.modal', function() {
            // Clear the file input to allow reselection of the same file
            $('#upload').val('');
        });

    });
</script>
@endsection
