@extends('layouts/contentNavbarLayout')

@section('title', 'Cards basic - UI elements')
<!-- CKEditor  -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold">Student Activities Update</h5>
</div>
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('student-activities.edit',$studentactivities->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('content.student-activity.form', ['studentactivities' => $studentactivities])
                    <a href="{{ url('student-activities') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
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