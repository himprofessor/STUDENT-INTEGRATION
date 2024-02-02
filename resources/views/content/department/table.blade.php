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
            <td>N.o</td>
            <th>department_cover</th>
            <th>department_name</th>
            <th>description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @php
        $rowNumber = 1;
        @endphp
        @foreach ($departments as $department)
        <tr>
            <td>{{ $rowNumber }}</td>
            <td>
                @if ($department->media)
                <img src="{{ asset('storage/' .$department->media->image) }}" class="equal-image" alt="Departent Cover" width="150" height="90">
                @endif
            </td>
            <td>{{ $department->department_name }}</td>
            <td class="text-wrap">{!!($department->description)!!}</td>
            <td>
                <a href="{{ url('department&staff/department/edit', $department->id) }}" class="btn btn-sm"style="background-color: #009DE1; color:white">
                    <i class="bx bx-edit-alt me-1"></i> Edit
                </a>
                <button type="button" class="btn btn-sm" style="background-color: #E85252; color:white" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $department->id }}">
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
<!-- search ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
</script>