<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Sistema de Teleasistencia - Acceso a usuarios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
</head>

<body>
    <header class="cerrar-sess">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    </header>
    <div class="bloque-gestion">
        <form class="formoid-solid-red" method="post" action="index.php" enctype="multipart/form-data">
            <div class="title">
                <h2>Informes</h2>
            </div>
            <p>Volver al <a href="{{ route('home') }}">Inicio</a></p>
            <table class="custom-table" width="880px" border="0" class="index">
                <tbody>
                    <tr class="custom-row">
                        <td class="custom-cell">
                            <a href="{{ route('informes.beneficiarios.buscar') }}" class="click">
                                <img src="{{ asset('images/alta.png') }}" alt="Gestión de Usuarios" border="0"
                                    class="img-index">
                                <p>Listado de beneficiarios</p>
                            </a>
                        </td>
                        <td class="custom-cell">
                            <a href="{{ route('informes.contactos.buscar') }}" class="click"><img
                                    src="{{ asset('images/entrantes200.jpg') }}" alt="Llamadas Entrantes" border="0"
                                    class="img-index">
                                <p>Modificar beneficiario</p>
                            </a>
                        </td>
                        <td class="custom-cell">
                            <a href="{{ route('informes.consultar') }}" class="click">
                                <img src="{{ asset('images/alta.png') }}" alt="Gestión de Usuarios" border="0"
                                    class="img-index">
                                <p>Alta de nuevo beneficiario</p>
                            </a>
                        </td>
                        <td class="custom-cell">
                            <a href="{{ route('informes.previstas') }}" class="click"><img
                                    src="{{ asset('images/entrantes200.jpg') }}" alt="Llamadas Entrantes" border="0"
                                    class="img-index">
                                <p>Modificar beneficiario</p>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="custom-table" width="880px" border="0">
                <tbody>
                    <tr class="custom-row">
                        <td class="custom-cell">
                            <a href="{{ route('informes.entrantes') }}" class="click">
                                <img src="{{ asset('images/alta.png') }}" alt="Gestión de Usuarios" border="0"
                                    class="img-index">
                                <p>Alta de nuevo beneficiario</p>
                            </a>
                        </td>
                        <td class="custom-cell">
                            <a href="{{ route('informes.salientes') }}" class="click">
                                <img src="{{ asset('images/alta.png') }}" alt="Gestión de Usuarios" border="0" class="img-index">
                                <p>Alta de nuevo beneficiario</p>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>

</html>
