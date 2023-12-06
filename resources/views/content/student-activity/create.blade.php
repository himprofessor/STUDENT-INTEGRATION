@extends('layouts/contentNavbarLayout')

@section('title', 'Cards basic - UI elements')

<!-- Hide validation  -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- CKEditor  -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold">Student Activities Create</h5>
</div>
<div class="row row-2">
    <div class="col-xl">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('student-activities.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('content.student-activity.form')
                    <a href="{{ url('student-activities') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn" style="background-color: #009DE1; color:white">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
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

    // Hide Validation text-danger
    $(document).ready(function() {
        $('#basic-default-title, #basic-default-user, #basic-default-image').on('input change', function() {
            $(this).removeClass('is-invalid');
            $(this).next('.text-danger').hide();
        });
    });

    // PreviewImage create
    function previewImages(event) {
        let previewContainer = document.getElementById('preview-container');
        previewContainer.innerHTML = ''; // Clear any existing previews
        let files = event.target.files;
        for (let i = 0; i < files.length; i++) {
            let file = files[i];
            let reader = new FileReader();
            reader.onload = function(e) {
                let image = document.createElement('img');
                image.src = e.target.result;
                image.classList.add('d-block', 'rounded');
                image.style.cursor = 'pointer';
                image.height = 100;
                image.width = 100;
                previewContainer.appendChild(image);
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
