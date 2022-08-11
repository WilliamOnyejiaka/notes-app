<div class="modal fade" id="createNoteModal" tabindex="-1" aria-labelledby="createNoteModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createNoteForm" action="#" data-token="{{ csrf_token() }}">
                    <div class="mb-3">
                        <label for="title" class="col-form-label">Title:</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="">
                        <div style="display: none;" id="titleAlert"
                            class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>title length must be greater than 0.</strong>
                            <button type="button" class="btn-close create-close"></button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="body" class="col-form-label">Body:</label>
                        <textarea class="form-control" id="body" name="body" value=""></textarea>
                        <div style="display: none;" id="bodyAlert"
                            class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>body length must be greater than 0.</strong>
                            <button type="button" class="btn-close create-close"></button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div style="display: none;" id="errorAlert"
                            class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>something went wrong.</strong>
                            <button type="button" class="btn-close create-close"></button>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Note</button>
                    </div>
            </div>
            </form>
        </div>

    </div>
</div>

<script type="module" src="{{ asset('scripts/dist/create-note.js') }}"></script>
