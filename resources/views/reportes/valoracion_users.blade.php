<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>ValoraciónUsuarios</title>
    <style type="text/css">
        * {
            font-family: sans-serif;
        }

        @page {
            margin-top: 1cm;
            margin-bottom: 1cm;
            margin-left: 1.5cm;
            margin-right: 1cm;
        }

        table {
            width: 60%;
            border-collapse: collapse;
            table-layout: fixed;
            margin: auto;
            margin-top: 20px;
            page-break-before: avoid;
        }

        table thead tr th,
        tbody tr td {
            padding: 3px;
            font-size: 10pt;
            word-wrap: break-word;
        }

        table thead tr th {
            font-size: 9pt;
        }

        table tbody tr td {
            font-size: 8pt;
        }


        .encabezado {
            width: 100%;
        }

        .logo img {
            position: absolute;
            width: 180px;
            height: 75px;
            top: -20px;
            left: 0px;
        }

        h2.titulo {
            width: 450px;
            margin: auto;
            margin-top: -20PX;
            margin-bottom: 15px;
            text-align: center;
            font-size: 14pt;
        }

        .texto {
            width: 370px;
            text-align: center;
            margin: auto;
            margin-top: 15px;
            font-weight: bold;
            font-size: 1.1em;
        }

        .fecha {
            width: 250px;
            text-align: center;
            margin: auto;
            margin-top: 15px;
            font-weight: normal;
            font-size: 0.85em;
        }

        .total {
            text-align: right;
            padding-right: 15px;
            font-weight: bold;
        }

        tr {
            page-break-inside: avoid !important;
        }

        .centreado {
            text-align: center;
        }

        .datos {
            margin-left: 15px;
            border-top: solid 1px;
            border-collapse: collapse;
            width: 250px;
        }

        .txt {
            font-weight: bold;
            text-align: right;
            padding-right: 5px;
        }

        .txt_center {
            font-weight: bold;
            text-align: center;
        }

        .b_top {
            border-top: solid 1px #083b7a;
        }

        .b_bottom {
            border-bottom: solid 1px #083b7a;
        }

        .b_bottom2 {
            border-bottom: solid 2px #083b7a;
        }

        .text-lg {
            font-size: 1.3em;
        }

        .gray {
            background: rgb(202, 202, 202);
        }

        .text-primary {
            color: #083b7a;
        }

        .bg_primary {
            background: #083b7a;
            color: white;
        }

        .img_celda img {
            width: 45px;
        }

        .bold {
            font-weight: bold;
        }

        .text_right {
            text-align: right;
        }

        .breakpage {
            page-break-after: always;
        }

        .table_empresas {
            width: 60%;
            margin: auto;
        }
    </style>
</head>

<body>
    @inject('configuracion', 'App\Models\Configuracion')
    @php
        $contador = 0;
    @endphp
    @foreach ($usuarios as $u)
        <div class="encabezado">
            <div class="logo">
                <img src="{{ asset('imgs/' . $configuracion->first()->logo) }}">
                {{ $configuracion->first()->logo }}
            </div>
            <h2 class="titulo">
                {{ $configuracion->first()->nombre_sistema }}
            </h2>
            <h4 class="texto">Cantidad de generación de valoraciones por usuario</h4>
            <h4 class="fecha">Expedido: {{ date('d-m-Y') }}</h4>
        </div>

        <table>
            <tbody>
                <tr>
                    <td class="text_right" width="17%">Usuario:</td>
                    <td class="bold">{{ $u->full_name }}</td>
                </tr>
                <tr>
                    <td class="text_right">C.I.:</td>
                    <td class="bold">{{ $u->full_ci }}</td>
                </tr>
                <tr>
                    <td class="text_right">Tipo:</td>
                    <td class="bold">{{ $u->tipo }}</td>
                </tr>
                <tr>
                    <td class="text_right">Correo:</td>
                    <td class="bold">{{ $u->correo }}</td>
                </tr>
                <tr>
                    <td class="text_right">Teléfono(s):</td>
                    <td class="bold">{{ $u->fono }}</td>
                </tr>
                <tr>
                    <td class="text_right">Acceso:</td>
                    <td class="bold">{{ $u->acceso == 1 ? 'HABILITADO' : 'DESHABILITADO' }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table_empresas">
            <tbody>
                <tr class="b_bottom2">
                    <td class="bold text-primary centreado" colspan="2">LISTA DE EMPRESAS</td>
                </tr>
                <tr class="b_bottom2">
                    <td class="bold text-primary centreado" width="70%">Nombre Empresa</td>
                    <td class="bold text-primary centreado">Cantidad</td>
                </tr>
                @foreach ($empresas as $key => $e)
                    <tr class="{{ $key == count($empresas) - 1 ? 'b_bottom2' : 'b_bottom' }}">
                        <td class="centreado">{{ $e->nombre }}</td>
                        <td class="centreado">{{ $valoracion_user[$u->id][$e->id] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @php
            $contador++;
        @endphp
        @if ($contador < count($usuarios))
            <div class="breakpage"></div>
        @endif
    @endforeach
</body>

</html>
