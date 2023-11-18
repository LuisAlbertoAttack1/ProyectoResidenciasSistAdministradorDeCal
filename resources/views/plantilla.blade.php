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
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/DataTable/jquery.dataTables.js') }}"></script>
    @include('sweetalert::alert')
    <title>{{ $titulo }}</title>
</head>

<body>
    @auth
    @include('shared/Navbar')
    @endauth
    <div class="min-vh-100 d-flex flex-column justify-content-between">
        @yield('contenido')
    </div>
    @include('shared/Footer')
    <script>
        $(document).ready(() =>{
            $('#contenido_tabla').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
        });
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>