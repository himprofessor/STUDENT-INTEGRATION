<table class="table table-hover">
    <thead>
        <tr>
            <th>N.o</th>
            <th>Profile</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @php
        $rowNumber = 1;
        @endphp
        @foreach ($staffs as $staff)
        <tr>
            <div class="hover-card">
                <td class="hover-row" data-bs-toggle="modal" data-bs-target="#confirmView{{ $staff->id }}" style="cursor: pointer;" title="view detail">
                    {{ $rowNumber }}
                </td>
                <td class="hover-row" data-bs-toggle="modal" data-bs-target="#confirmView{{ $staff->id }}" style="cursor: pointer;">
                    {{-- @if ($staff->media)
                        <img src="{{ asset('storage/' . $staff->media->image) }}" class="rounded-circle" alt="Staff Image" width="40" height="40">
                    @endif --}}
                    <ul class="list-unstyled staffs-list m-0 avatar-group d-flex align-items-center">
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xm pull-up" title="{{$staff->first_name}}">
                            <img src="{{ asset('storage/' . $staff->media->image) }}" alt="Avatar" class="rounded-circle">
                        </li>
                    </ul>
                </td>
                <td class="hover-row" data-bs-toggle="modal" data-bs-target="#confirmView{{ $staff->id }}" style="cursor: pointer;" title="view detail">
                    {{$staff->first_name}}
                </td>
                <td class="hover-row" data-bs-toggle="modal" data-bs-target="#confirmView{{ $staff->id }}" style="cursor: pointer;" title="view detail">
                    {{$staff->last_name}}
                </td>
                <td class="hover-row" data-bs-toggle="modal" data-bs-target="#confirmView{{ $staff->id }}" style="cursor: pointer;" title="view detail">
                    {!! Str::limit($staff->email, 35, '...') !!}
                </td>
            </div>
            <td>
                <a href="{{ url('department&staff/staff/edit', $staff->id) }}" class="btn btn-sm" style="background-color: #009DE1; color:white">
                    <i class="bx bx-edit-alt me-1"></i> Edit
                </a>
                <button type="button" class="btn btn-sm" style="background-color: #E85252; color:white" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $staff->id }}">
                    <i class="bx bx-trash me-1"></i> Delete
                </button>
            </td>
        </tr>
        @include('content.staff.delete')
        @include('content.staff.view')
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