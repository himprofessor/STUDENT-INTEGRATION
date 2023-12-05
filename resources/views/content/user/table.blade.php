@if (session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>profile</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @php
        $rowNumber = 1;
        @endphp
        @foreach ($users as $user)
        <tr>
            <td>{{ $rowNumber }}</td>
            <td>
                {{-- @if ($user->media)
                        <img src="{{ asset('storage/' . $user->media->image) }}" class="rounded-circle"
                alt="User Image" width="40" height="40">
                @endif --}}
                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" title="{{ $user->username }}">
                        <img src="{{ asset('storage/' . $user->media->image) }}" alt="Avatar" class="rounded-circle">
                    </li>
                </ul>
            </td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ url('user/edit', $user->id) }}" class="btn btn-sm" style="background-color: #009DE1; color:white">
                    <i class="bx bx-edit-alt me-1"></i> Edit
                </a>
                <button type="button" class="btn btn-sm" style="background-color: #E85252; color:white" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $user->id }}">
                    <i class="bx bx-trash me-1"></i> Delete
                </button>
            </td>
        </tr>
        @include('content.user.delete')
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