<?php

namespace App\Exports;

use App\Models\Prisionero;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class PrisionerosExport implements 
    FromCollection, 
    WithHeadings, 
    WithTitle, 
    WithStyles, 
    WithCustomStartCell, 
    WithDrawings,
    WithEvents
{
    protected $fechaInicio;
    protected $fechaFin;

    public function __construct($fechaInicio, $fechaFin)
    {
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
    }

    public function collection()
    {
        return Prisionero::whereBetween('fecha_ingreso', [$this->fechaInicio, $this->fechaFin])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre Completo',
            'Fecha de Nacimiento',
            'Fecha de Ingreso', 
            'Delito Cometido',
            'Celda Asignada',
            'Fecha de Creación', 
            'Fecha de Modificación', 
        ];
    }

    public function title(): string
    {
        return 'Reporte de Prisioneros';
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Título del reporte
            'A1:H1' => [
                'font' => ['bold' => true, 'size' => 20],
                'alignment' => ['horizontal' => 'center'],
            ],
            // Estilo para los encabezados
            'A3:H3' => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => '4CAF50'],
                ],
            ],
            // Estilo para las celdas de datos
            'A4:H' . (Prisionero::whereBetween('fecha_ingreso', [$this->fechaInicio, $this->fechaFin])->count() + 3) => [
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['argb' => '000000'],
                    ],
                ],
            ],
        ];
    }

    public function startCell(): string
    {
        return 'A3';
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Logo de la Cárcel');
        $drawing->setPath(public_path('imagenes/logo carcel.jpg')); // Asegúrate de que esta ruta sea correcta
        $drawing->setHeight(50);
        $drawing->setWidth(50);
        $drawing->setCoordinates('A1');

        return $drawing;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet;

                // Título del reporte
                $sheet->mergeCells('A1:H1');
                $sheet->setCellValue('A1', 'Reporte de Prisioneros - Cárcel El Redentor');

                // Ajustar ancho de columnas automáticamente
                foreach (range('A', 'H') as $columnID) {
                    $sheet->getDelegate()->getColumnDimension($columnID)->setAutoSize(true);
                }
            },
        ];
    }
}
