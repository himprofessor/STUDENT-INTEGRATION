<table class="table table-striped">
    <thead>
        <tr>
            <th>Job_Title</th>
            <th>Job_Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">

        @foreach ($careeropportunities as $careeropportunity)
        <tr>
            <td>{{$careeropportunity->job_title}}</td>
            <td>{{ html_entity_decode(strip_tags($careeropportunity->job_description)) }}</td>
            <td>
                <a href="{{ url('career-opportunities/edit', $careeropportunity->id) }}" class="btn btn-primary btn-sm">
                    <i class="bx bx-edit-alt me-1"></i> Edit
                </a>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $careeropportunity->id }}">
                    <i class="bx bx-trash me-1"></i> Delete
                </button>
            </td>
        </tr>

        @include('content.career-opportunity.delete')
        @endforeach
    </tbody>
</table>