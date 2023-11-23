@extends('layouts/contentNavbarLayout')

@section('title', 'Cards basic - UI elements')

<!-- CKEditor  -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<!-- //crop -->
<script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>

<link rel="stylesheet" href="https://unpkg.com/cropperjs/dist/cropper.css">

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

<!-- Link javascript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('content')
<div class="row row-2">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="fw-bold text-center ">Create Slideshow</h3>

                <form method="POST" action="{{ route('slideshow.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('content.slideshow.form')
                    <a href="{{ url('slideshow') }}" class="btn btn-secondary me-1">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>
<script>
    // CK Editor---
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: [
                'heading',
                '|',
                'bold',
                'italic',
                'link',
                'bulletedList',
                'numberedList'
            ],
        })
        .catch(error => {
            console.log(error);
        });
</script>
@endsection

<!-- Javascript Validate slideshow -->
<script>
$(document).ready(function() {
  $('#basic-default-fullname, #upload').on('input change', function() {
    $('#heading-error').hide();
    $(this).removeClass('is-invalid');
  });
});

</script>

<!-- // Crop image in javascrip -->
<script>
    $(document).ready(function() {
        $('#upload').on('change', function() {
            $('#cropForm').show();
            var input = this;
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#cropPreview').attr('src', e.target.result);

                // Initialize Cropper.js
                var cropper = new Cropper($('#cropPreview')[0], {
                    aspectRatio: 1, // Set the desired aspect ratio for cropping
                    viewMode: 1, // Set the default view mode
                    autoCropArea: 0.5, // Set the initial auto crop area
                });

                $('#cropButton').on('click', function() {
                    // Get the cropped canvas
                    var canvas = cropper.getCroppedCanvas();

                    // Convert canvas to base64 data URL
                    var croppedImage = canvas.toDataURL();

                    // Set the cropped image as the source for the original image
                    $('#uploadedAvatar').attr('src', croppedImage);

                    // Hide the crop form
                    $('#cropForm').hide();

                    // Attach the cropped image to the file input
                    canvas.toBlob(function(blob) {
                        var newFile = new File([blob], input.files[0].name, { type: input.files[0].type });
                        input.files = [newFile];

                        // Show the image in the slideshow list
                        $('#slideshowListImage').attr('src', croppedImage);
                    });
                });
            };
            reader.readAsDataURL(input.files[0]);
        });
    });
</script>
