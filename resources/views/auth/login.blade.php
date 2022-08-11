@extends('layouts.app')

@section('content')
    <livewire:login-form />
    <script type="module" src="{{ asset('scripts/dist/login.js') }}"></script>
@endsection
