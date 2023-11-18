@if (session()->has('success'))
<div class="alert alert-success" id="success-message">
    {{ session('success') }}
</div>
@endif

<script>
    // Fade out the success message after 5 seconds
    setTimeout(function() {
        document.getElementById('success-message').style.display = 'none';
    }, 800);
</script>

<table class="table table-striped">
    <thead>
        <tr>
            <td>#</td>
            <th>department_name</th>
            <th>department_cover</th>
            <th>Action Department</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @php
        $rowNumber = 1;
        @endphp
        @foreach ($departments as $department)
        <tr>
            <td>{{ $rowNumber }}</td>
            <td>{{ $department->department_name }}</td>
            <td>
                @if ($department->media)
                <img src="{{ asset('storage/' . $department->media->image) }}" alt="Departent Cover"  width="110px">
                @endif
            </td>

            <td>
                <a href="{{ url('department&staff/department/edit', $department->id) }}" class="btn btn-primary btn-sm">
                    <i class="bx bx-edit-alt me-1"></i> Edit
                </a>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $department->id }}">
                    <i class="bx bx-trash me-1"></i> Delete
                </button>
            </td>
        </tr>

        @include('content.department.delete')
        @php
        $rowNumber++;
        @endphp
        @endforeach
    </tbody>
</table>