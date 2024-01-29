<div class="modal fade" id="confirmEdit{{ $term->id }}" tabindex="-1" role="dialog" aria-labelledby="confirmEditLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="confirmEditLabel">Confirm Edit</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <p class="mb-0 text-wrap">You want to Edit this term?</p>
          </div>
          <div class="modal-footer">
              <form method="POST" action="{{ url('/term&subject/term/edit/' . $term->id) }}">
                @csrf
                @method('PUT')
                <!-- Hidden input for term_id -->
                <input type="hidden" name="term_id" value="{{ $term->id }}">

                <!-- Form fields -->
                <div class="input-group w-75">
                    <input type="text" name="term_name" id="term" class="form-control border border-1" placeholder="Term" value="{{ old('term_name', $term->term_name) }}">
                    <button type="submit" class="btn" style="background-color: #009DE1; color:white">Update</button>
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </form>
            <br>
          </div>
      </div>
  </div>
</div>
