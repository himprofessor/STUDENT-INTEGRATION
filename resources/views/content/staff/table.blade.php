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

        @foreach ($staffs as $person)
        <tr>
            <td>{{$person->first_name}}</td>
            <td>{{$person->last_name}}</td>
            <td>{{$person->email}}</td>
            <td>{{$person->position}}</td>
            <td><img src="{{asset('storage/'.$person->profile)}}" class="w-50 h-50"></td>
            <td>{{$person->phone}}</td>
            <td>
                <a href="{{ url('staff/edit', $person->id) }}" class="btn btn-primary btn-sm">
                    <i class="bx bx-edit-alt me-1"></i> Edit
                </a>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $person->id }}">
                    <i class="bx bx-trash me-1"></i> Delete
                </button>
            </td>
        </tr>

        @include('content.staff.delete')
        @endforeach
    </tbody>
</table>