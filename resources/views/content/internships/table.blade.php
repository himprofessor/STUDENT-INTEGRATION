<table class="table table-hover">
    <thead>
        <tr>
            <th>N.o</th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @php
        $rowNumber = 1;
        @endphp
        @foreach ($internships as $internship)
        <tr>
            <td class="hover-row" data-bs-toggle="modal" data-bs-target="#confirmView{{ $internship->id }}" style="cursor: pointer;" title="view Image">{{ $rowNumber }}</td>
            <td class="hover-row text-wrap" data-bs-toggle="modal" data-bs-target="#confirmView{{ $internship->id }}" style="cursor: pointer;" title="view Image">{{$internship->internship_title}}</td>
            <td class="hover-row text-wrap" data-bs-toggle="modal" data-bs-target="#confirmView{{ $internship->id }}" style="cursor: pointer;" title="view Image">
                {!! Str::limit($internship->internship_description, 140, '...') !!}
            </td>
            <td>
                <a href="{{ url('internships-program/edit', $internship->id) }}" class="btn btn-sm" style="background-color: #009DE1; color:white">
                    <i class="bx bx-edit-alt me-1"></i> Edit
                </a>
                <button type="button" class="btn btn-sm" style="background-color: #E85252; color:white" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $internship->id }}">
                    <i class="bx bx-trash me-1"></i> Delete
                </button>
            </td>
        </tr>
        @include('content.internships.delete')
        @include('content.internships.view')
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