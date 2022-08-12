@extends('layouts.app')
@section('content')
    <livewire:navbar />

    @foreach ($notes as $note)
        <livewire:card :title="$note->title" :body="$note->body" :noteId="$note->id" wire:key="'card'.$note->id" />
    @endforeach
    {{ $notes->links() }}

    @if (Session::has('success'))
        <div class="modal fade" id="staticBackdrop" data-show="true" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ Session::get('success') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $("#staticBackdrop").modal('show');
            });
        </script>
    @endif

    {{-- @if (Session::has('error'))
        <div class="modal fade" id="staticBackdrop" data-show="true" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{ Session::get('error') }}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $("#staticBackdrop").modal('show');
            });
        </script>
    @endif --}}
    <livewire:create-note />
    <livewire:note-details-modal />
    <script type="module" src="{{ asset('scripts/dist/create-note.js') }}"></script>
    <script type="module" src="{{ asset('scripts/dist/card.js') }}"></script>
@endsection
