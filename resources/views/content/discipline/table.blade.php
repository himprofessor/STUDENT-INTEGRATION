<table class="table table-striped">
    <thead>
        <tr>
            <td>N.o</td>
            <th>Discipline File</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @php
            $rowNumber = 1;
        @endphp
        @foreach ($rules as $rule)
        <tr>
            <td>{{ $rowNumber }}</td>
            <td>{{ $rule->original_name_file}}</td>
            <td>
                <a href="{{ route('disciplines.edit', $rule->id) }}" class="btn btn-sm" style="background-color: #009DE1; color:white" data-bs-toggle="modal" data-bs-target="#confirmEdit{{ $rule->id }}">
                    <i class="bx bx-edit-alt me-1"></i> Edit
                </a>
                <button type="button" class="btn btn-sm" style="background-color: #E85252; color:white" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $rule->id }}">
                    <i class="bx bx-trash me-1"></i> Delete
                </button>
            </td>
        </tr>
        @include('content.discipline.edit')
        @include('content.discipline.delete')
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