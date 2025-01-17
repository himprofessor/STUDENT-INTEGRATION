@extends('layouts/contentNavbarLayout')

@section('title', 'Cards basic - UI elements')
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
    <h5 class="fw-bold">Internship Program Update</h5>
</div>
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{ url('/internships-program/edit/' . $internships->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('content.internships.form', ['internships' => $internships])
                    <a href="{{ url('internships-program') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn" style="background-color: #009DE1; color:white">Update</button>
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

    // PreviewImage edit
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