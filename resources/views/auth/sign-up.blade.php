@extends('layouts.app')

@section('content')
    <livewire:sign-up-form />
    <script type="module" src="{{ asset('scripts/dist/sign-up.js') }}"></script>
@endsection