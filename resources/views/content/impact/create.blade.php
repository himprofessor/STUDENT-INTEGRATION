@extends('layouts/contentNavbarLayout')

@section('title', 'Impact basic - UI elements')

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
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

<!-- Link javascript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('content')
<div class="row row-2">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="fw-bold text-center ">Create Impact</h3>

                <form method="POST" action="{{ route('impact.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('content.impact.form')
                    <a href="{{ url('impact') }}" class="btn btn-secondary me-1">Cancel</a>
                    <button type="submit" class="btn" style="background-color: #009DE1; color:white">Submit</button>
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
                'title',
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

<script>
    // <!-- Javascript Validate impact -->
    $(document).ready(function() {
        $('#basic-default-fullname, #upload').on('input change', function() {
            $('#title-error').hide();
            $(this).removeClass('is-invalid');
        });
    });
</script>
