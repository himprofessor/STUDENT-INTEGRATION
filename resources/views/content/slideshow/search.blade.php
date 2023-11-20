<div class="row ">  
    <div class="col-md-10">
        <div class="form-group">
            <form method="GET" action="{{ route('slideshow.search') }}">
                <div class="input-group">
                    <input class="form-control" name="search" placeholder="Search..." value="{{ request()->input('search') }}">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-1">
        <h2>
            <a href="{{ route('slideshow') }}" class="btn btn-danger">Clear</a>
        </h2>
    </div>
</div>