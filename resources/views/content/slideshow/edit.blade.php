@extends('layouts/contentNavbarLayout')

@section('title', 'Slideshow Card - UI elements')

<!-- CKEditor  -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<!-- //crop -->
<script src="https://unpkg.com/cropperjs/dist/cropper.js"></script>
<link rel="stylesheet" href="https://unpkg.com/cropperjs/dist/cropper.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>

    <script>
        // CKEditor
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

    <script>
        // Javascript Validate slideshow
        $(document).ready(function() {
            $('#basic-default-fullname, #upload').on('input change', function() {
                $('#heading-error').hide();
                $(this).removeClass('is-invalid');
            });
        });

        // Javascript crop image slideshow
        $(document).ready(function() {
            $('#upload').on('change', function() {
                $('#uploadedAvatar').hide();
                $('#cropForm').show();
                let input = this;
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#cropPreview').attr('src', e.target.result);

                    // Initialize Cropper.js
                    let cropper = new Cropper($('#cropPreview')[0], {
                        viewport: {
                            width: 400,
                            height: 400
                        },
                        boundary: {
                            width: 500,
                            height: 500
                        },
                        showZoomer: false,
                        enableResize: true,
                        enableOrientation: true,
                        mouseWheelZoom: 'ctrl'
                    });

                    $('#cropButton').on('click', function() {
                        let canvas = cropper.getCroppedCanvas(); // Get the cropped canvas
                        let croppedImage = canvas.toDataURL(); // Convert canvas to base64 data URL

                        // Set the cropped image as the source for the original image
                        $('#uploadedAvatar').attr('src', croppedImage);
                        $('#uploadedAvatar').show();
                        $('#cropForm').hide(); // Hide the crop form

                        // Set the cropped image data to the hidden input field
                        $('#croppedImage').val(croppedImage);
                    });
                };
                reader.readAsDataURL(input.files[0]);
            });
        });
    </script>
@endsection

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold">Slideshow Update</h5>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="POST" action="{{ route('slideshow.update', $slideshow->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('content.slideshow.form', ['slideshow' => $slideshow])
                        <a href="{{ url('slideshow') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
