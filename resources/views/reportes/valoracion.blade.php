<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Valoración</title>
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
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
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
            width: 200px;
            height: 90px;
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
            width: 250px;
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

        table {
            width: 100%;
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

        .text_right{
            text-align: right;
        }
    </style>
</head>

<body>
    @inject('configuracion', 'App\Models\Configuracion')
    <div class="encabezado">
        <div class="logo">
            <img src="{{ asset('imgs/' . $configuracion->first()->logo) }}">
            {{ $configuracion->first()->logo }}
        </div>
        <h2 class="titulo">
            {{ $configuracion->first()->nombre_sistema }}
        </h2>
        <h4 class="texto">VALORACIÓN DE STARTUPS</h4>
        <h4 class="fecha">Expedido: {{ date('d-m-Y') }}</h4>
    </div>

    <table>
        <tbody>
            <tr class="b_bottom2">
                <td class="bold text-lg text-primary" colspan="2">{{ $empresa->nombre }}</td>
            </tr>
            <tr>
                <td class="text_right" width="17%">Comenzó en Industria:</td>
                <td class="bold">{{ $empresa->cuestionario->array_cuestionario[33] }}</td>
            </tr>
            <tr>
                <td class="text_right">Industria:</td>
                <td class="bold">
                    {{ $info_cuestionario[19][1][$empresa->cuestionario->array_cuestionario[19][0]][
                        $empresa->cuestionario->array_cuestionario[19][1]
                    ] }}
                </td>
            </tr>
            <tr>
                <td class="text_right">Actividad de Negocios:</td>
                <td class="bold">{{ $empresa->descripcion_actividad }}</td>
            </tr>
            <tr>
                <td class="text_right">Empleados:</td>
                <td class="bold">{{ $empresa->cuestionario->array_cuestionario[5] }}</td>
            </tr>
            <tr>
                <td class="text_right">Etapa:</td>
                <td class="bold">{{ $info_cuestionario[12][$empresa->cuestionario->array_cuestionario[12]] }}</td>
            </tr>
            <tr class="b_bottom2">
                <td class="text_right">Ganancia inicial:</td>
                <td class="bold">{{ $empresa->primera_finanza->ganancia }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th colspan="4" class="text-primary">VALORACIÓN PREVIA AL DINERO</th>
            </tr>
            <tr class="b_bottom2">
                <th class="text-primary">Fondos</th>
                <th class="text-primary">Valoración</th>
                <th class="text-primary">Limite bajo</th>
                <th class="text-primary">Limite alto</th>
            </tr>
        </thead>
        <tbody>
            <tr class="b_bottom2">
                <td class="centreado">{{ $empresa->valoracion->fondos }}</td>
                <td class="centreado">{{ $empresa->valoracion->valoracion_previa }}</td>
                <td class="centreado">{{ $empresa->valoracion->limite_bajo }}</td>
                <td class="centreado">{{ $empresa->valoracion->limite_alto }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th colspan="3" class="text-primary">DFC(Flujo de Fondos Descontados)</th>
            </tr>
            <tr class="b_bottom2">
                <th class="text-primary">Gestión</th>
                <th class="text-primary">Tasa de supervivencia</th>
                <th class="text-primary">Tasa de fracaso</th>
            </tr>
        </thead>
        <tbody>
            @php
                $valuacion = $empresa->valoracion->valuacion;
            @endphp
            @foreach ($empresa->finanzas()->where('flujo_caja_libre', '>', 0)->where('flujo_caja_libre', '!=', null)->orderBy('id', 'asc')->get() as $f)
                @php
                    $gestion = $f->gestion;
                    $gestion = substr($gestion, 2, 2);
                    $txt_gestion = '01/' . $gestion . ' - 12/' . $gestion;
                    $tasa_sup = 0;
                    if ($valuacion > 0) {
                        $tasa_sup = number_format(((float) $f->flujo_caja_libre / $valuacion) * 100, 2, '.', '');
                    }
                    $tasa_frac = number_format(100 - $tasa_sup, 2, '.', '');
                @endphp
                <tr class="b_bottom">
                    <td class="centreado">{{ $txt_gestion }}</td>
                    <td class="centreado">{{ $tasa_sup }}</td>
                    <td class="centreado">{{ $tasa_frac }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>



    <table>
        <thead>
            <tr class="b_bottom2">
                <th class="text-primary">Valuación</th>
                <th class="text-primary">Último EBITDA</th>
            </tr>
        </thead>
        <tbody>
            <tr class="b_bottom2">
                <td class="centreado">{{ $empresa->valoracion->valuacion }}</td>
                <td class="centreado">{{ $empresa->valoracion->ultimo_ebitda }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
