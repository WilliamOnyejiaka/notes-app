<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min .css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script defer src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('jquery/jquery.min.js') }}" referrerpolicy="no-referrer"></script>
    <title>
        @if (Session::has('title'))
            {{ Session::get('title') }}
        @else
            No Title
        @endif
    </title>
    <livewire:styles />
</head>

<body style="background-color: #160F30;">
    @yield('content')
    <livewire:scripts />

</body>

</html>
