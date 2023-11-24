<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>User Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @php
        $rowNumber = 1;
        @endphp
        @foreach ($studentactivities as $activities)
        <tr>
            <td class="hover-row" data-bs-toggle="modal" data-bs-target="#confirmView{{ $activities->id }}" style="cursor: pointer;" title="view Image">{{ $rowNumber }}</td>
            <td class="hover-row" data-bs-toggle="modal" data-bs-target="#confirmView{{ $activities->id }}" style="cursor: pointer;" title="view Image">{{$activities->title}}</td>
            <td class="hover-row" data-bs-toggle="modal" data-bs-target="#confirmView{{ $activities->id }}" style="cursor: pointer;" title="view Image">{{$activities->user->username}}</td>
            <td>
                <a href="{{ url('student-activities/edit', $activities->id) }}" class="btn btn-primary btn-sm">
                    <i class="bx bx-edit-alt me-1"></i> Edit
                </a>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $activities->id }}">
                    <i class="bx bx-trash me-1"></i> Delete
                </button>
            </td>
        </tr>
        @php
        $rowNumber++;
        @endphp
        @include('content.student-activity.delete')
        @include('content.student-activity.view')
        @endforeach
    </tbody>
</table>