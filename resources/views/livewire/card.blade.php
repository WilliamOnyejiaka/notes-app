<div class="container my-2">
    <div class="row">
        <div class="col-6">
            <div class="card bg-dark mb-3" style="max-width: 20rem;" data-bs-toggle="modal" data-bs-target="#noteDetails"
                data-note-id="{{ $noteId }}">
                <div class="card-header" id="note-title-{{ $noteId }}" style="color: rgb(218, 206, 206);">{{ $title }}</div>
                <div class="card-body">
                    <p class="card-text text-truncate" id="note-body-{{ $noteId }}"
                        style="color: rgb(218, 206, 206);">{{ $body }}</p>
                </div>
                {{-- <div class="card-footer">
                    <button type="button" class="btn btn-primary" data-note-id="{{ $noteId }}">Update
                        Note</button>
                    <button type="button" class="btn btn-danger" data-note-id="{{ $noteId }}">Delete
                        Note</button>
                </div> --}}
            </div>
        </div>

    </div>
</div>
