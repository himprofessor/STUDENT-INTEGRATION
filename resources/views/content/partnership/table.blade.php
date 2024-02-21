@if (session()->has('success'))
<div class="alert alert-success" id="success-message">
    {{ session('success') }}
</div>
@endif

<script>
    // Fade out the success message after 5 seconds
    setTimeout(function() {
        document.getElementById('success-message').style.display = 'none';
    }, 800);
</script>

<table class="table table-striped">
    <thead>
        <tr>
            <th>N.o</th>
            <th>Logo</th>
            <th>Name</th>
            <th>Address</th>
            <th>Website</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @php
        $rowNumber = 1;
        @endphp
        @foreach ($partnerships as $partnership)
        <tr>
            <td>{{ $rowNumber }}</td> 
            <td>
                @if ($partnership->media)
                <img src="{{ asset('storage/' . $partnership->media->image) }}" class="rounded-md" alt="partnership-icon" width="70" height="50">
                @endif
            </td>
            <td class="text-wrap">{{ $partnership->partnership_name }}</td>
            <td class="text-wrap">{{ $partnership->address }}</td>
            <td style="cursor: pointer;">
                @if($partnership->website)
                <a href="{{ $partnership->website }}">Link</a>
                @else 
                <p class="{{ $partnership->website }}"></p>
                @endif
            </td>
            <td>
                <a href="{{ url('partnership/edit', $partnership->id) }}" class="btn btn-sm" style="background-color: #009DE1; color:white">
                    <i class="bx bx-edit-alt me-2"></i> Edit
                </a>
                <button type="button" class="btn btn-sm" style="background-color: #E85252; color:white" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $partnership->id }}">
                    <i class="bx bx-trash me-2"></i> Delete
                </button>
            </td>
        </tr>
        @include('content.partnership.delete')
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
