<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\Cuestionario;
use App\Models\Empresa;
use App\Models\Notificacion;
use App\Models\User;
use App\Models\ValoracionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PDF;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ReporteController extends Controller
{
    public function usuarios(Request $request)
    {
        $filtro =  $request->filtro;
        $usuarios = User::where('id', '!=', 1)->orderBy("paterno", "ASC")->get();

        if ($filtro == 'Tipo de usuario') {
            $request->validate([
                'tipo' => 'required',
            ]);
            $usuarios = User::where('id', '!=', 1)->where('tipo', $request->tipo)->orderBy("paterno", "ASC")->get();
        }

        $pdf = PDF::loadView('reportes.usuarios', compact('usuarios'))->setPaper('legal', 'landscape');

        // ENUMERAR LAS PÁGINAS USANDO CANVAS
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        $alto = $canvas->get_height();
        $ancho = $canvas->get_width();
        $canvas->page_text($ancho - 90, $alto - 25, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 9, array(0, 0, 0));

        return $pdf->download('Usuarios.pdf');
    }

    public function valoracion(Request $request)
    {
        $request->validate([
            "empresa_id" => "required"
        ], [
            "empresa_id.required" => "Debes seleccionar una empresa"
        ]);

        $empresa_id = $request->empresa_id;
        $empresa = Empresa::find($empresa_id);
        if ($request->tipo == 'pdf') {
            return self::valoracion_pdf($empresa);
        }
        return self::valoracion_excel($empresa);
    }

    public static function valoracion_pdf(Empresa $empresa)
    {
        $info_cuestionario = Cuestionario::infoCuestionario();
        $pdf = PDF::loadView('reportes.valoracion', compact('empresa', 'info_cuestionario'))->setPaper('letter', 'portrait');

        // ENUMERAR LAS PÁGINAS USANDO CANVAS
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        $alto = $canvas->get_height();
        $ancho = $canvas->get_width();
        $canvas->page_text($ancho - 90, $alto - 25, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 9, array(0, 0, 0));

        return $pdf->download('valoracion.pdf');
    }

    public static function valoracion_excel(Empresa $empresa)
    {
        $info_cuestionario = Cuestionario::infoCuestionario();

        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()
            ->setCreator("ADMIN")
            ->setLastModifiedBy('Administración')
            ->setTitle('Valoración')
            ->setSubject('Valoración')
            ->setDescription('Valoración')
            ->setKeywords('PHPSpreadsheet')
            ->setCategory('Listado');

        $sheet = $spreadsheet->getActiveSheet();

        $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');

        $styleTexto = [
            'font' => [
                'bold' => true,
                'size' => 12,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE,
                ],
            ],
        ];

        $styleTexto2 = [
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['argb' => '083b7a'],
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                // 'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'bottom' => [
                    'borderStyle' => Border::BORDER_THICK, // Grosor del borde
                    'color' => ['argb' => '083b7a'],
                ],
            ]
        ];

        $styleTexto3 = [
            'font' => [
                'size' => 9,
                'color' => ['argb' => '000000'],
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            ],
        ];

        $styleTexto4 = [
            'font' => [
                'bold' => true,
                'size' => 9,
                'color' => ['argb' => '083b7a'],
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
        ];

        $styleTexto5 = [
            'font' => [
                'bold' => true,
                'size' => 9,
                'color' => ['argb' => '083b7a'],
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $styleTexto6 = [
            'font' => [
                'size' => 9,
                'color' => ['argb' => '000000'],
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $styleTexto7 = [
            'font' => [
                'size' => 9,
                'color' => ['argb' => '000000'],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'bottom' => [
                    'borderStyle' => Border::BORDER_THIN, // Grosor del borde
                    'color' => ['argb' => '083b7a'],
                ],
            ],
            // 'fill' => [
            //     'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            //     'color' => ['rgb' => '203764']
            // ],
        ];

        $fila = 1;
        if (file_exists(public_path() . '/imgs/' . Configuracion::first()->logo)) {
            $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
            $drawing->setName('logo');
            $drawing->setDescription('logo');
            $drawing->setPath(public_path() . '/imgs/' . Configuracion::first()->logo); // put your path and image here
            $drawing->setCoordinates('A' . $fila);
            $drawing->setOffsetX(0);
            $drawing->setOffsetY(0);
            $drawing->setHeight(100);
            $drawing->setWorksheet($sheet);
        }

        $fila = 2;
        $sheet->setCellValue('A' . $fila, Configuracion::first()->nombre_sistema);
        $sheet->mergeCells("A" . $fila . ":F" . $fila);  //COMBINAR CELDAS
        $sheet->getStyle('A' . $fila . ':F' . $fila)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A' . $fila . ':F' . $fila)->applyFromArray($styleTexto);
        $fila++;
        $sheet->setCellValue('A' . $fila, "VALORACIÓN DE STARTUPS");
        $sheet->mergeCells("A" . $fila . ":F" . $fila);  //COMBINAR CELDAS
        $sheet->getStyle('A' . $fila . ':F' . $fila)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A' . $fila . ':F' . $fila)->applyFromArray($styleTexto);
        $fila++;
        $fila++;
        $fila++;
        $fila++;

        $sheet->setCellValue('A' . $fila, $empresa->nombre);
        $sheet->mergeCells("A" . $fila . ":F" . $fila);  //COMBINAR CELDAS
        $sheet->getStyle('A' . $fila . ':F' . $fila)->applyFromArray($styleTexto2);
        $fila++;
        if ($empresa->cuestionario && $empresa->valoracion) {
            // comenzo en industria
            $sheet->setCellValue('A' . $fila, "Comenzó en Industria:");
            $sheet->getStyle('A' . $fila)->applyFromArray($styleTexto3);
            $sheet->getStyle('A' . $fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

            $sheet->setCellValue('B' . $fila, $empresa->cuestionario->array_cuestionario[33]);
            $sheet->mergeCells("B" . $fila . ":F" . $fila);  //COMBINAR CELDAS
            $sheet->getStyle('B' . $fila . ':F' . $fila)->applyFromArray($styleTexto4);
            $fila++;

            // industria
            $sheet->setCellValue('A' . $fila, "Industria:");
            $sheet->getStyle('A' . $fila)->applyFromArray($styleTexto3);
            $sheet->getStyle('A' . $fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

            $sheet->setCellValue('B' . $fila, $info_cuestionario[19][1][$empresa->cuestionario->array_cuestionario[19][0]][$empresa->cuestionario->array_cuestionario[19][1]]);
            $sheet->mergeCells("B" . $fila . ":F" . $fila);  //COMBINAR CELDAS
            $sheet->getStyle('B' . $fila . ':F' . $fila)->applyFromArray($styleTexto4);
            $fila++;

            // actividad de negocios
            $sheet->setCellValue('A' . $fila, "Actividad de Negocios:");
            $sheet->getStyle('A' . $fila)->applyFromArray($styleTexto3);
            $sheet->getStyle('A' . $fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

            $sheet->setCellValue('B' . $fila, $empresa->descripcion_actividad);
            $sheet->mergeCells("B" . $fila . ":F" . $fila);  //COMBINAR CELDAS
            $sheet->getStyle('B' . $fila . ':F' . $fila)->applyFromArray($styleTexto4);
            $fila++;

            // empleados
            $sheet->setCellValue('A' . $fila, "Empleados:");
            $sheet->getStyle('A' . $fila)->applyFromArray($styleTexto3);
            $sheet->getStyle('A' . $fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

            $sheet->setCellValue('B' . $fila, $empresa->cuestionario->array_cuestionario[5]);
            $sheet->mergeCells("B" . $fila . ":F" . $fila);  //COMBINAR CELDAS
            $sheet->getStyle('B' . $fila . ':F' . $fila)->applyFromArray($styleTexto4);
            $fila++;

            // etapa
            $sheet->setCellValue('A' . $fila, "Etapa:");
            $sheet->getStyle('A' . $fila)->applyFromArray($styleTexto3);
            $sheet->getStyle('A' . $fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

            $sheet->setCellValue('B' . $fila, $info_cuestionario[12][$empresa->cuestionario->array_cuestionario[12]]);
            $sheet->mergeCells("B" . $fila . ":F" . $fila);  //COMBINAR CELDAS
            $sheet->getStyle('B' . $fila . ':F' . $fila)->applyFromArray($styleTexto4);
            $fila++;

            // gasto inicial
            $sheet->setCellValue('A' . $fila, "Ganancia inicial:");
            $sheet->getStyle('A' . $fila)->applyFromArray($styleTexto3);
            $sheet->getStyle('A' . $fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

            $sheet->setCellValue('B' . $fila, $empresa->primera_finanza->ganancia);
            $sheet->mergeCells("B" . $fila . ":F" . $fila);  //COMBINAR CELDAS
            $sheet->getStyle('B' . $fila . ':F' . $fila)->applyFromArray($styleTexto4);
            $sheet->getStyle('A' . $fila . ':F' . $fila)->getBorders()->getBottom()->setBorderStyle(Border::BORDER_THICK);
            $sheet->getStyle('A' . $fila . ':F' . $fila)->getBorders()->getBottom()->getColor()->setRGB('203764');
            $fila++;
            $fila++;

            $sheet->setCellValue('A' . $fila, "VALORACIÓN PREVIA AL DINERO");
            $sheet->mergeCells("A" . $fila . ":F" . $fila);  //COMBINAR CELDAS
            $sheet->getStyle('A' . $fila . ':F' . $fila)->getAlignment()->setHorizontal('center');
            $sheet->getStyle('A' . $fila . ':F' . $fila)->applyFromArray($styleTexto5);
            $fila++;
            $sheet->setCellValue('B' . $fila, "Fondos");
            $sheet->setCellValue('C' . $fila, "Valoración");
            $sheet->setCellValue('D' . $fila, "Límite bajo");
            $sheet->setCellValue('E' . $fila, "Límite alto");
            $sheet->getStyle('B' . $fila . ':E' . $fila)->getBorders()->getBottom()->setBorderStyle(Border::BORDER_THICK);
            $sheet->getStyle('B' . $fila . ':E' . $fila)->getBorders()->getBottom()->getColor()->setRGB('203764');
            $sheet->getStyle('B' . $fila . ':E' . $fila)->applyFromArray($styleTexto5);
            $fila++;
            $sheet->setCellValue('B' . $fila, $empresa->valoracion->fondos);
            $sheet->setCellValue('C' . $fila, $empresa->valoracion->valoracion_previa);
            $sheet->setCellValue('D' . $fila, $empresa->valoracion->limite_bajo);
            $sheet->setCellValue('E' . $fila, $empresa->valoracion->limite_alto);
            $sheet->getStyle('B' . $fila . ':E' . $fila)->getBorders()->getBottom()->setBorderStyle(Border::BORDER_THICK);
            $sheet->getStyle('B' . $fila . ':E' . $fila)->getBorders()->getBottom()->getColor()->setRGB('203764');
            $sheet->getStyle('B' . $fila . ':E' . $fila)->applyFromArray($styleTexto6);
            $fila++;
            $fila++;

            $sheet->setCellValue('A' . $fila, "DFC(Flujo de Fondos Descontados");
            $sheet->mergeCells("A" . $fila . ":F" . $fila);  //COMBINAR CELDAS
            $sheet->getStyle('A' . $fila . ':F' . $fila)->getAlignment()->setHorizontal('center');
            $sheet->getStyle('A' . $fila . ':F' . $fila)->applyFromArray($styleTexto5);
            $fila++;
            $sheet->setCellValue('B' . $fila, "Gestión");
            $sheet->setCellValue('C' . $fila, "Tasa de supervivencia");
            $sheet->setCellValue('D' . $fila, "Tasa de fracaso");
            $sheet->getStyle('B' . $fila . ':D' . $fila)->getBorders()->getBottom()->setBorderStyle(Border::BORDER_THICK);
            $sheet->getStyle('B' . $fila . ':D' . $fila)->getBorders()->getBottom()->getColor()->setRGB('203764');
            $sheet->getStyle('B' . $fila . ':D' . $fila)->applyFromArray($styleTexto5);
            $fila++;
            $valuacion = $empresa->valoracion->valuacion;
            foreach ($empresa->finanzas()->where('flujo_caja_libre', '>', 0)->where('flujo_caja_libre', '!=', null)->orderBy('id', 'asc')->get() as $f) {
                $gestion = $f->gestion;
                $gestion = substr($gestion, 2, 2);
                $txt_gestion = '01/' . $gestion . ' - 12/' . $gestion;
                $tasa_sup = 0;
                if ($valuacion > 0) {
                    $tasa_sup = number_format(((float) $f->flujo_caja_libre / $valuacion) * 100, 2, '.', '');
                }
                $tasa_frac = number_format(100 - $tasa_sup, 2, '.', '');
                $sheet->setCellValue('B' . $fila, $txt_gestion);
                $sheet->setCellValue('C' . $fila, $tasa_sup);
                $sheet->setCellValue('D' . $fila, $tasa_frac);
                $sheet->getStyle('B' . $fila . ':D' . $fila)->applyFromArray($styleTexto7);
                $fila++;
            }
            $fila++;
            $sheet->setCellValue('B' . $fila, "Valuación");
            $sheet->mergeCells("B" . $fila . ":C" . $fila);  //COMBINAR CELDAS
            $sheet->setCellValue('D' . $fila, "Último EBITDA");
            $sheet->mergeCells("D" . $fila . ":E" . $fila);  //COMBINAR CELDAS
            $sheet->getStyle('A' . $fila . ':F' . $fila)->getAlignment()->setHorizontal('center');
            $sheet->getStyle('A' . $fila . ':F' . $fila)->applyFromArray($styleTexto5);
            $sheet->getStyle('B' . $fila . ':E' . $fila)->getBorders()->getBottom()->setBorderStyle(Border::BORDER_THICK);
            $sheet->getStyle('B' . $fila . ':E' . $fila)->getBorders()->getBottom()->getColor()->setRGB('203764');
            $fila++;
            $sheet->setCellValue('B' . $fila, $empresa->valoracion->valuacion);
            $sheet->mergeCells("B" . $fila . ":C" . $fila);  //COMBINAR CELDAS
            $sheet->setCellValue('D' . $fila, $empresa->valoracion->ultimo_ebitda);
            $sheet->mergeCells("D" . $fila . ":E" . $fila);  //COMBINAR CELDAS
            $sheet->getStyle('B' . $fila . ':E' . $fila)->applyFromArray($styleTexto7);
            $sheet->getStyle('B' . $fila . ':E' . $fila)->getBorders()->getBottom()->setBorderStyle(Border::BORDER_THICK);
            $sheet->getStyle('B' . $fila . ':E' . $fila)->getBorders()->getBottom()->getColor()->setRGB('203764');
        } else {
            $sheet->setCellValue('A' . $fila, "AÚN NO SE TIENE SUFICIENTE INFORMACIÓN SOBRE ESTA EMPRESA");
            $sheet->mergeCells("A" . $fila . ":F" . $fila);  //COMBINAR CELDAS
        }

        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(20);

        foreach (range('A', 'F') as $columnID) {
            $sheet->getStyle($columnID)->getAlignment()->setWrapText(true);
        }

        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getPageMargins()->setTop(0.5);
        $sheet->getPageMargins()->setRight(0.1);
        $sheet->getPageMargins()->setLeft(0.1);
        $sheet->getPageMargins()->setBottom(0.1);
        $sheet->getPageSetup()->setPrintArea('A:F');
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        // DESCARGA DEL ARCHIVO
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Valoracion.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }

    public function valoracion_users(Request $request)
    {
        $request->validate([
            "empresa_id" => "required"
        ], [
            "empresa_id.required" => "Debes seleccionar una empresa"
        ]);

        $empresa_id = $request->empresa_id;
        $empresas = Empresa::all();
        if ($empresa_id != "todos") {
            $empresas = Empresa::where("id", $empresa_id)->get();
        }

        $usuarios = User::where('id', '!=', 1)->whereIn("tipo", ["EMPRESA", "INVERSIONISTA"])->get();

        $valoracion_user = [];
        foreach ($usuarios as $u) {
            foreach ($empresas as $e) {
                $valoracion_user[$u->id][$e->id] = 0;
                $existe_valoracion = ValoracionUser::where("user_id", $u->id)->where("empresa_id", $e->id)->get()->first();
                if ($existe_valoracion) {
                    $valoracion_user[$u->id][$e->id] = $existe_valoracion->cantidad;
                }
            }
        }

        if ($request->tipo == 'pdf') {
            return self::valoracion_users_pdf($empresas, $usuarios, $valoracion_user);
        }
        return self::valoracion_users_excel($empresas, $usuarios, $valoracion_user);
    }

    public static function valoracion_users_pdf($empresas, $usuarios, $valoracion_user)
    {

        $pdf = PDF::loadView('reportes.valoracion_users', compact('empresas', 'usuarios', 'valoracion_user'))->setPaper('letter', 'portrait');

        // ENUMERAR LAS PÁGINAS USANDO CANVAS
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf->get_canvas();
        $alto = $canvas->get_height();
        $ancho = $canvas->get_width();
        $canvas->page_text($ancho - 90, $alto - 25, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 9, array(0, 0, 0));

        return $pdf->download('valoracion_usuarios.pdf');
    }

    public static function valoracion_users_excel($empresas, $usuarios, $valoracion_user)
    {
        $info_cuestionario = Cuestionario::infoCuestionario();

        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()
            ->setCreator("ADMIN")
            ->setLastModifiedBy('Administración')
            ->setTitle('Valoración')
            ->setSubject('Valoración')
            ->setDescription('Valoración')
            ->setKeywords('PHPSpreadsheet')
            ->setCategory('Listado');

        $sheet = $spreadsheet->getActiveSheet();

        $spreadsheet->getDefaultStyle()->getFont()->setName('Arial');

        $styleTexto = [
            'font' => [
                'bold' => true,
                'size' => 12,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_NONE,
                ],
            ],
        ];

        $styleTexto2 = [
            'font' => [
                'bold' => true,
                'size' => 12,
                'color' => ['argb' => '083b7a'],
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'bottom' => [
                    'borderStyle' => Border::BORDER_THICK, // Grosor del borde
                    'color' => ['argb' => '083b7a'],
                ],
            ]
        ];

        $styleTexto3 = [
            'font' => [
                'size' => 9,
                'color' => ['argb' => '000000'],
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
            ],
        ];

        $styleTexto4 = [
            'font' => [
                'bold' => true,
                'size' => 9,
                'color' => ['argb' => '083b7a'],
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
            ],
        ];

        $styleTexto5 = [
            'font' => [
                'bold' => true,
                'size' => 9,
                'color' => ['argb' => '083b7a'],
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $styleTexto6 = [
            'font' => [
                'size' => 9,
                'color' => ['argb' => '000000'],
            ],
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
        ];

        $styleTexto7 = [
            'font' => [
                'size' => 9,
                'color' => ['argb' => '000000'],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'bottom' => [
                    'borderStyle' => Border::BORDER_THIN, // Grosor del borde
                    'color' => ['argb' => '083b7a'],
                ],
            ],
            // 'fill' => [
            //     'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
            //     'color' => ['rgb' => '203764']
            // ],
        ];

        $fila = 1;
        if (file_exists(public_path() . '/imgs/' . Configuracion::first()->logo)) {
            $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
            $drawing->setName('logo');
            $drawing->setDescription('logo');
            $drawing->setPath(public_path() . '/imgs/' . Configuracion::first()->logo); // put your path and image here
            $drawing->setCoordinates('A' . $fila);
            $drawing->setOffsetX(0);
            $drawing->setOffsetY(0);
            $drawing->setHeight(100);
            $drawing->setWorksheet($sheet);
        }

        $fila = 2;
        $sheet->setCellValue('A' . $fila, Configuracion::first()->nombre_sistema);
        $sheet->mergeCells("A" . $fila . ":F" . $fila);  //COMBINAR CELDAS
        $sheet->getStyle('A' . $fila . ':F' . $fila)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A' . $fila . ':F' . $fila)->applyFromArray($styleTexto);
        $fila++;
        $sheet->setCellValue('A' . $fila, "Cantidad de generación de valoraciones por usuario");
        $sheet->mergeCells("A" . $fila . ":F" . $fila);  //COMBINAR CELDAS
        $sheet->getStyle('A' . $fila . ':F' . $fila)->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A' . $fila . ':F' . $fila)->applyFromArray($styleTexto);
        $fila++;
        $fila++;
        $fila++;
        $fila++;

        foreach ($usuarios as $u) {
            // usuario
            $sheet->setCellValue('A' . $fila, "Usuario:");
            $sheet->getStyle('A' . $fila)->applyFromArray($styleTexto3);
            $sheet->getStyle('A' . $fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $sheet->setCellValue('B' . $fila, $u->full_name);
            $sheet->mergeCells("B" . $fila . ":F" . $fila);  //COMBINAR CELDAS
            $sheet->getStyle('B' . $fila . ':F' . $fila)->applyFromArray($styleTexto4);
            $fila++;

            // Ci
            $sheet->setCellValue('A' . $fila, "C.I.:");
            $sheet->getStyle('A' . $fila)->applyFromArray($styleTexto3);
            $sheet->getStyle('A' . $fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $sheet->setCellValue('B' . $fila, $u->full_ci);
            $sheet->mergeCells("B" . $fila . ":F" . $fila);  //COMBINAR CELDAS
            $sheet->getStyle('B' . $fila . ':F' . $fila)->applyFromArray($styleTexto4);
            $fila++;

            // TIPO
            $sheet->setCellValue('A' . $fila, "Tipo:");
            $sheet->getStyle('A' . $fila)->applyFromArray($styleTexto3);
            $sheet->getStyle('A' . $fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $sheet->setCellValue('B' . $fila, $u->tipo);
            $sheet->mergeCells("B" . $fila . ":F" . $fila);  //COMBINAR CELDAS
            $sheet->getStyle('B' . $fila . ':F' . $fila)->applyFromArray($styleTexto4);
            $fila++;

            // correo
            $sheet->setCellValue('A' . $fila, "Correo:");
            $sheet->getStyle('A' . $fila)->applyFromArray($styleTexto3);
            $sheet->getStyle('A' . $fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $sheet->setCellValue('B' . $fila, $u->correo);
            $sheet->mergeCells("B" . $fila . ":F" . $fila);  //COMBINAR CELDAS
            $sheet->getStyle('B' . $fila . ':F' . $fila)->applyFromArray($styleTexto4);
            $fila++;

            // telefonos
            $sheet->setCellValue('A' . $fila, "Teléfono(s):");
            $sheet->getStyle('A' . $fila)->applyFromArray($styleTexto3);
            $sheet->getStyle('A' . $fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $sheet->setCellValue('B' . $fila, $u->fono);
            $sheet->mergeCells("B" . $fila . ":F" . $fila);  //COMBINAR CELDAS
            $sheet->getStyle('B' . $fila . ':F' . $fila)->applyFromArray($styleTexto4);
            $fila++;

            // acceso
            $sheet->setCellValue('A' . $fila, "Acceso:");
            $sheet->getStyle('A' . $fila)->applyFromArray($styleTexto3);
            $sheet->getStyle('A' . $fila)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $sheet->setCellValue('B' . $fila, $u->acceso == 1 ? 'HABILITADO' : 'DESHABILITADO');
            $sheet->mergeCells("B" . $fila . ":F" . $fila);  //COMBINAR CELDAS
            $sheet->getStyle('B' . $fila . ':F' . $fila)->applyFromArray($styleTexto4);
            $fila++;

            // titulo lista empresas
            $sheet->setCellValue('A' . $fila, "LISTA DE EMPRESAS");
            $sheet->mergeCells("A" . $fila . ":F" . $fila);  //COMBINAR CELDAS
            $sheet->getStyle('A' . $fila . ':F' . $fila)->applyFromArray($styleTexto2);
            $fila++;

            // titulos
            $sheet->setCellValue('A' . $fila, "Nombre Empresa");
            $sheet->mergeCells("A" . $fila . ":D" . $fila);  //COMBINAR CELDAS
            $sheet->setCellValue('E' . $fila, "Cantidad");
            $sheet->mergeCells("E" . $fila . ":F" . $fila);  //COMBINAR CELDAS
            $sheet->getStyle('A' . $fila . ':F' . $fila)->getBorders()->getBottom()->setBorderStyle(Border::BORDER_THICK);
            $sheet->getStyle('A' . $fila . ':F' . $fila)->getBorders()->getBottom()->getColor()->setRGB('203764');
            $sheet->getStyle('A' . $fila . ':F' . $fila)->applyFromArray($styleTexto5);
            $fila++;

            foreach ($empresas as $key => $e) {
                $sheet->setCellValue('A' . $fila, $e->nombre);
                $sheet->mergeCells("A" . $fila . ":D" . $fila);  //COMBINAR CELDAS
                $sheet->setCellValue('E' . $fila, $valoracion_user[$u->id][$e->id]);
                $sheet->mergeCells("E" . $fila . ":F" . $fila);  //COMBINAR CELDAS
                $sheet->getStyle('A' . $fila . ':F' . $fila)->applyFromArray($styleTexto7);
                if ($key == count($empresas) - 1) {
                    $sheet->getStyle('A' . $fila . ':F' . $fila)->getBorders()->getBottom()->setBorderStyle(Border::BORDER_THICK);
                    $sheet->getStyle('A' . $fila . ':F' . $fila)->getBorders()->getBottom()->getColor()->setRGB('203764');
                }
                $fila++;
            }
            $fila = $fila +  5;
        }
        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(20);

        foreach (range('A', 'F') as $columnID) {
            $sheet->getStyle($columnID)->getAlignment()->setWrapText(true);
        }

        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
        $sheet->getPageMargins()->setTop(0.5);
        $sheet->getPageMargins()->setRight(0.1);
        $sheet->getPageMargins()->setLeft(0.1);
        $sheet->getPageMargins()->setBottom(0.1);
        $sheet->getPageSetup()->setPrintArea('A:F');
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        // DESCARGA DEL ARCHIVO
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Valoracion.xlsx"');
        header('Cache-Control: max-age=0');
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }
}
