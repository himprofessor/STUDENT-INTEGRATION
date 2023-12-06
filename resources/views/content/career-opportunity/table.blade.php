<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Job_Title</th>
            <th>Job_Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @php
        $rowNumber = 1;
        @endphp
        @foreach ($careeropportunities as $careeropportunity)
        
        <tr>
            <td>{{ $rowNumber }}</td>
            <td>{{$careeropportunity->job_title}}</td>
            <td class="text-wrap">
                {!! ($careeropportunity->job_description) !!}
            </td>
            <td>
                <a href="{{ url('career-opportunities/edit', $careeropportunity->id) }}" class="btn btn-sm" style="background-color: #009DE1; color:white">
                    <i class="bx bx-edit-alt me-1"></i> Edit
                </a>
                <button type="button" class="btn btn-sm" style="background-color: #E85252; color: white" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $careeropportunity->id }}">
                    <i class="bx bx-trash me-1"></i> Delete
                </button>
            </td>
        </tr>

        @include('content.career-opportunity.delete')
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
        headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
    });
</script>