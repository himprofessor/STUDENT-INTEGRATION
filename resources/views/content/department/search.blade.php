<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/bootstrap-icons.js"></script>

<link rel="stylesheet" href="/path/to/bootstrap-icons.css">
<script src="/path/to/bootstrap-icons.js"></script>

<div class="row py-2">
    <div class="col-md-10">
        <div class="form-group">
            <form method="GET" action="{{ route('department.search') }}">
                <div class="input-group">
                    <input class="form-control" name="search" placeholder="Search..." value="{{ request()->input('search') }}">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-search"></i> Search
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-2">
        <h2>
            <a href="{{ route('department') }}" class="btn btn-danger">
                <i class="bi bi-x-circle"></i> Clear
            </a>
        </h2>
    </div>
</div>



