<table class="table table-striped">
    <thead>
        <tr>
            <td>#</td>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @php
            $rowNumber = 1;
        @endphp
        @foreach ($courses as $course)
            <tr>
                <td>{{ $rowNumber }}</td>
                <td>{{ $course->title }}</td>
                <td>{{ $course->description }}</td>
                <td>
                    <a href="{{ url('course/edit', $course->id) }}" class="btn btn-primary btn-sm">
                        <i class="bx bx-edit-alt me-1"></i> Edit
                    </a>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                        data-bs-target="#confirmDelete{{ $course->id }}">
                        <i class="bx bx-trash me-1"></i> Delete
                    </button>
                </td>
            </tr>

            @include('content.course.delete')
            @php
                $rowNumber++;
            @endphp
        @endforeach
    </tbody>
</table>
