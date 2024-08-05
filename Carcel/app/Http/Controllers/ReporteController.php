<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PrisionerosExport;
use App\Exports\VisitantesExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf; // Importar la clase Pdf
use App\Models\Visitante;
use App\Models\Prisionero;

class ReporteController extends Controller
{
    public function index()
    {
        return view('reportes.index');
    }

    public function generar(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');
        $tipoReporte = $request->input('tipo_reporte');
        $exportarComo = $request->input('export');
        $datos = $this->obtenerDatos($tipoReporte, $fechaInicio, $fechaFin);
        if($datos->isEmpty()){
            return redirect()->back()->with(['error' => 'No hay datos disponibles para realizar el reporte']);

        }
        if ($exportarComo == 'pdf') {
         
            $pdf = Pdf::loadView('reportes.pdf', [
                'datos' => $datos,
                'tipo_reporte' => $tipoReporte,
                'fecha_inicio' => $fechaInicio,
                'fecha_fin' => $fechaFin,
            ])->setPaper('a4', 'landscape');

            return $pdf->download('reporte_' . $tipoReporte . '.pdf');
        } elseif ($exportarComo == 'excel') {
            if ($tipoReporte == 'prisioneros') {
                return Excel::download(new PrisionerosExport($fechaInicio, $fechaFin), 'prisioneros.xlsx');
            } elseif ($tipoReporte == 'visitantes') {
                return Excel::download(new VisitantesExport($fechaInicio, $fechaFin), 'visitantes.xlsx');
            }
        }

        // Lógica para mostrar los resultados si no es exportación
        $datos = $this->obtenerDatos($tipoReporte, $fechaInicio, $fechaFin);

        return view('reportes.resultado', [
            'datos' => $datos,
            'tipo_reporte' => $tipoReporte,
            'fecha_inicio' => $fechaInicio,
            'fecha_fin' => $fechaFin,
        ]);
    }

    private function obtenerDatos($tipoReporte, $fechaInicio, $fechaFin)
    {
        if ($tipoReporte == 'prisioneros') {
            return Prisionero::whereBetween('fecha_ingreso', [$fechaInicio, $fechaFin])->get();
        } else {
            return Visitante::whereBetween('created_at', [$fechaInicio, $fechaFin])->get();
        }
    }
}
