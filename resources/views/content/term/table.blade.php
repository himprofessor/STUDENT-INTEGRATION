<div class="d-flex justify-content-between my-3">
  <form action="{{ route('term.store') }}" method="post" class="col-md-5">
    @csrf
    <div class="input-group mb-3">
        <input type="text" placeholder="Input term name" name="term_name" id="term" class="form-control @error('term_name') is-invalid @enderror" value="{{ old('term_name', $term->term_name ?? '') }}">
        <button type="submit" class="btn" style="background-color: #009DE1; color:white">Add</button>
        <a href="{{ url('term&subject/term') }}" class="btn" style="background: rgb(154, 154, 154); color:white">Cancel</a>
      </div>
    @error('term_name')
    <div class="text-danger">{{ $message }}</div>
    @enderror
  </form>

  <form id="searchForm" action="{{ route('term.search') }}" method="get" class="col-md-5">
    @csrf
    <div class="input-group mb-3">
        <input type="text" name="search" id="search" class="form-control" placeholder="Search by term name">
        <button type="button" class="btn" style="background-color: #009DE1; color:white" onclick="submitSearchForm()">
            <i class="bx bx-search"></i> Search
        </button>
    </div>
  </form>
</div>

<table class="table table-striped">
  <thead>
      <tr>
          <td>N.o</td>
          <th>Term</th>
          <th>Actions</th>
      </tr>
  </thead>
  <tbody class="table-border-bottom-0">
      @php
      $rowNumber = 1;
      @endphp
      @foreach ($terms as $term)
      <tr>
          <td>{{ $rowNumber }}</td>
          <td>{{ $term->term_name }}</td>
          <td>
              <a href="{{ route('term.edit', $term->id) }}" class="btn btn-sm" style="background-color: #009DE1; color:white" data-bs-toggle="modal" data-bs-target="#confirmEdit{{ $term->id }}">
                  <i class="bx bx-edit-alt me-1"></i> Edit
              </a>
              <button type="button" class="btn btn-sm" style="background-color: #E85252; color:white" data-bs-toggle="modal" data-bs-target="#confirmDelete{{ $term->id }}">
                  <i class="bx bx-trash me-1"></i> Delete
              </button>
          </td>
      </tr>
      @include('content.term.edit')
      @include('content.term.delete')
      @php
      $rowNumber++;
      @endphp
      @endforeach
  </tbody>
</table>

<!-- search ajax -->
<script type="text/javascript">
  function submitSearchForm(event) {
      event.preventDefault(); // Prevent the default form submission

      var formData = $('#searchForm').serialize();

      $.ajax({
          type: 'GET',
          url: $('#searchForm').attr('action'),
          data: formData,
          success: function(response) {
              // Handle the response, for example, update the table with search results
              console.log(response);
          },
          error: function(error) {
              console.error('Error submitting search form:', error);
          }
      });
  }
</script>


