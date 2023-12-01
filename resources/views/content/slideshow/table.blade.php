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
            <th>#</th>
            <th>Slideshow</th>
            <th>Heading</th>
            <th>Description</th>
            <th>Actions Slideshow</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">

        @php
        $rowNumber = 1;
        @endphp
        @foreach ($slideshows as $slideshow)
        <tr>
            <td>{{ $rowNumber }}</td>
            <td>
                <img src="{{asset('storage/'.$slideshow->media->image)}}" width="100px" alt="Slideshow">
            </td>
            <td>{{ $slideshow->heading }}</td>
            <td class="text-wrap">{!!($slideshow->description)!!}</td>

            <td>
                <a href="{{ url('slideshow/edit', $slideshow->id) }}" class="btn btn-primary btn-sm">
                    <i class="bx bx-edit-alt me-2"></i> Edit
                </a>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $slideshow->id }}">
                    <i class="bx bx-trash me-2"></i> Delete
                </button>
            </td>
        </tr>
        
        @include('content.slideshow.delete')
        @php
        $rowNumber++;
        @endphp
        @endforeach
    </tbody>
</table>