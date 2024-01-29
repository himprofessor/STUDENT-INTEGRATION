@extends('layouts/contentNavbarLayout')

@section('title', 'term basic - UI elements')

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/masonry/masonry.js') }}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="fw-bold">term Update</h5>
</div>
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-body">
                <form method="POST" action="{{ url('/term&subject/term/edit/' . $terms->id) }}">
                    @csrf
                    @method('PUT')
                    {{-- @include('content.term.table', ['term' => $terms]) --}}
                    @include('content.term.table', ['terms' => $terms])
                    <a href="{{ url('term&subject/term') }}" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn" style="background-color: #009DE1; color:white">update</button>
                </form>

                <form action="{{ ('/term&subject/term/edit/' . $terms->id) }}" method="post"  class="col-md-6">
                  @csrf
                  <!-- Form fields -->
                  <div class="input-group">
                    {{-- <input type="text" name="term" id="term" class="form-control border border-1" placeholder="Term"> --}}
                    <button type="submit" class="btn" style="background-color: #009DE1; color:white">update</button>
                    <a href="{{ url('term&subject/term')}}" class="btn btn-secondary me-1">Cancel</a>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
