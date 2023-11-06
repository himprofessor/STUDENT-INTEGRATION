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
    <h5 class="fw-bold">Staff Update</h5>
</div>
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{ route('staff.edit',$staff->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('content.staff.form', ['staff' => $staff])
                    <a href="{{ url('department&staff/staff') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- CKEditor  -->
<script>
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