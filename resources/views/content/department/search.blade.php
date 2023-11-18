
<div class="row py-2">  
    <div class="col-md-6">
        <div class="form-group">
            <form method="GET" action="{{ route('department.search') }}">
                <div class="input-group">
                    <input class="form-control" name="search" placeholder="Search..." value="{{ isset($search) ? $search : '' }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <h2>
            <a href="{{ route('department') }}" class="btn btn-danger">Clear</a>
        </h2>
    </div>
</div>