<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('img/favicon.webp') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href=" {{ asset('css/DataTable/jquery.dataTables.css') }} ">
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('js/DataTable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    @include('sweetalert::alert')

    {{-- {{ asset('img/logocbt3.png') }} --}}
    <title>{{ $titulo }}</title>
</head>

<body>
@include('shared/Navbar')
<div class="min-vh-100 d-flex flex-column justify-content-between">

</div>
@include('shared/Footer')

</body>

</html>
