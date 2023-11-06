@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>UserName</th>
            <th>Email</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody class="table-border-bottom-0">
        @php
            $rowNumber = 1;
        @endphp
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <img src="{{ asset('storage/' . $user->image) }}" alt="User Image" width="100">
                </td>
                <td>
                  <a href="{{ url('user/edit', $user->id) }}" class="btn btn-primary btn-sm">
                      <i class="bx bx-edit-alt me-2"></i> Edit
                  </a>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                      data-bs-target="#confirmDelete{{ $user->id }}">
                      <i class="bx bx-trash me-2"></i> Delete
                  </button>
                </td>
            </tr>
          @include('content.user.delete')
        @endforeach
        @php
            $rowNumber++;
        @endphp
    </tbody>
</table>
