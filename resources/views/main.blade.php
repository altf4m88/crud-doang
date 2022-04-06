<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PPDB SMK Indonesia</title>
    {{-- <link rel="icon" type="image/x-icon" href="{{asset('/book-atlas-solid.svg')}}"> --}}
</head>
<body>
    @include('layout.navbar')

    @yield('content')

    {{-- @if(Request::is('/registration-report'))
        @include('layout.footer')
    @endif --}}

    @yield('modals')
    @yield('script')
</body>
</html>
