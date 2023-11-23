<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Profile</th>
            <th>first_name</th>
            <th>last_name</th>
            <th>email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @php
        $rowNumber = 1;
        @endphp
        @foreach ($staffs as $staff)
        <tr>
            <td class="hover-row" data-bs-toggle="modal" data-bs-target="#confirmView{{ $staff->id }}" style="cursor: pointer;" title="view detail">
                {{ $rowNumber }}
            </td>
            <td class="hover-row" data-bs-toggle="modal" data-bs-target="#confirmView{{ $staff->id }}" style="cursor: pointer;">
                {{-- @if ($staff->media)
                    <img src="{{ asset('storage/' . $staff->media->image) }}" class="rounded-circle" alt="Staff Image" width="40" height="40">
                @endif --}}
                <ul class="list-unstyled staffs-list m-0 avatar-group d-flex align-items-center">
                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" title="{{$staff->first_name}}">
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
                {{$staff->email}}
            </td>
            <td>
                <a href="{{ url('department&staff/staff/edit', $staff->id) }}" class="btn btn-primary btn-sm">
                    <i class="bx bx-edit-alt me-1"></i> Edit
                </a>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $staff->id }}">
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