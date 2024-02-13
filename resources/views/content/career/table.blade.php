@if (session()->has('success'))
<div class="alert alert-success" id="success-message">
    {{ session('success') }}
</div>
@endif

<script>
    // Fade out the success message after 5 seconds
    setTimeout(function() {
        document.getElementById('success-message').style.display = 'none';
    }, 1000);
</script>

<table class="table table-striped">
    <thead>
        <tr>
            <th>N.o</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @php
        $rowNumber = 1;
        @endphp
        @foreach ($careers as $career)
        <tr>
            <td>{{ $rowNumber }}</td>
            <td>
                <img src="{{ asset('storage/' .$career->media->image) }}" class="equal-image" alt="career Image" width="150" height="90">
            </td>
            <td class="text-wrap">{{ $career->title }}</td>
            <td class="text-wrap">{!!($career->description)!!}</td>
            <td>
                <a href="{{ url('career/edit', $career->id) }}" class="btn btn-sm" style="background-color: #009DE1; color:white">
                    <i class="bx bx-edit-alt me-2"></i> Edit
                </a>
                <button type="button" class="btn btn-sm" style="background-color: #E85252; color:white" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $career->id }}">
                    <i class="bx bx-trash me-2"></i> Delete
                </button>
            </td>
        </tr>
        @include('content.career.delete')
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
