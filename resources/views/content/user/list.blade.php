@extends('layouts/contentNavbarLayout')

@section('title', 'User List - UI elements')

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection
@section('content')
  <div class="d-flex justify-content-between align-items-center mb-4">
      <h5 class="fw-bold">User List</h5>
      <a href="{{ url('user/create') }}" class="btn btn-primary">New</a>
  </div>
  <div class="card">
      <div class="card-body">
          <div class="table-responsive text-nowrap">
              @include('content.user.table')
              {{ $users->links() }}
          </div>
      </div>
  </div>
@endsection

