<table class="table table-striped">
    <thead>
        <tr>
            <th>first_name</th>
            <th>last_name</th>
            <th>email</th>
            <th>Position</th>
            <th>Profile</th>
            <th>phone</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">

        @foreach ($staffs as $staff)
        <tr>
            <td>{{$staff->first_name}}</td>
            <td>{{$staff->last_name}}</td>
            <td>{{$staff->email}}</td>
            <td>{{$staff->position}}</td>
            <td><img src="{{asset('storage/'.$staff->profile)}}" class="w-50 h-50"></td>
            <td>{{$staff->phone}}</td>
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
        @endforeach
    </tbody>
</table>