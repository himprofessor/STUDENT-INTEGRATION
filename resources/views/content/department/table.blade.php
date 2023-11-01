<table class="table table-striped">
    <thead>
        <tr>
            <td>#</td>
            <th>department_name</th>
            <th>department_cover</th>
            <th>Action</th>
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
                <td>{{ $department->department_cover }}</td>
                <td>
                    <a href="{{ url('department&staff/department/edit', $department->id) }}" class="btn btn-primary btn-sm">
                        <i class="bx bx-edit-alt me-1"></i> Edit
                    </a>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                        data-bs-target="#confirmDelete{{ $department->id }}">
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
