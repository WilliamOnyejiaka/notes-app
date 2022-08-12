<div class="modal fade" id="noteDetails" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noteDetailsTitle" data-token="{{ csrf_token() }}">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="noteDetailsBody" contenteditable="true">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" id="update-btn" class="btn btn-primary" data-note-id="">Update</button>
                <button type="button" id="delete-btn"  class="btn btn-danger" data-note-id="">Delete</button>
            </div>
        </div>
    </div>
</div>



<script type="module" src="{{ asset('scripts/dist/note-details.js') }}"></script>
