@extends('layouts/contentNavbarLayout')

@section('title', 'Cards basic - UI elements')
<!-- CKEditor  -->
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

@section('vendor-script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold">Course Update</h5>
</div>
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{ url('/term&subject/course/edit/' . $courses->id) }}">
                    @csrf
                    @method('PUT')
                    @include('content.course.form', ['course' => $courses])
                    <a href="{{ url('term&subject/course') }}" class="btn btn-secondary">Cancel</a>
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
</script>
@endsection