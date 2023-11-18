@extends('layouts/contentNavbarLayout')

@section('title', 'Slideshow List - UI elements')

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection
@section('content')
  <div class="d-flex justify-content-between align-items-center mb-4">
      <h5 class="fw-bold">Slideshow List</h5>
      <a href="{{ url('slideshow/create') }}" class="btn btn-primary"> Add New</a>
  </div>
  
<!-- Include the search form -->
@include('content.slideshow.search')

<div class="card">
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            @include('content.slideshow.table')
        </div>
        
        <div class="d-flex justify-content-between mt-3">
            <div class="align-self-start">Total: {{$totalSlideshows}}</div>
            <div class="align-self-end">{{ $slideshows->links() }}</div>
        </div>
    </div>
</div>

@endsection

