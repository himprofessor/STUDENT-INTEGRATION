<table class="table table-hover">
    <thead>
        <tr>
            <th>N.o</th>
            <th>Course Name</th>
            <th>Course Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @php
        $rowNumber = 1;
        @endphp
        @foreach ($courses as $course)
        <tr>
            <div class="hover-card">
                <td>{{ $rowNumber }}</td>
                <td>{{$course->course_name}}</td>
                <td class="text-wrap">{!!($course->course_description)!!}</td>
            </div>
            <td>
                <a href="{{ url('term&subject/course/edit', $course->id) }}" class="btn btn-sm" style="background-color: #009DE1; color:white">
                    <i class="bx bx-edit-alt me-1"></i> Edit
                </a>
                <button type="button" class="btn btn-sm" style="background-color: #E85252; color:white" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $course->id }}">
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
<!-- search ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
</script>