<table class="table table-hover">
    <thead>
        <tr>
            <th>N.o</th>
            <th>Term</th>
            <th>Course</th>
            <th>Subject</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @php
        $rowNumber = 1;
        @endphp
        @foreach ($subjects as $subject)
        <tr>
            <div class="hover-card">
                <td>{{ $rowNumber }}</td>
                <td>{{$subject->term->term_name}}</td>
                <td>{{$subject->course->course_name}}</td>
                <td>{{$subject->subject_name}}</td>
            </div>
            <td>
                <a href="{{ url('term&subject/subject/edit', $subject->id) }}" class="btn btn-sm" style="background-color: #009DE1; color:white">
                    <i class="bx bx-edit-alt me-1"></i> Edit
                </a>
                <button type="button" class="btn btn-sm" style="background-color: #E85252; color:white" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $subject->id }}">
                    <i class="bx bx-trash me-1"></i> Delete
                </button>
            </td>
        </tr>
        @include('content.subject.delete')
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