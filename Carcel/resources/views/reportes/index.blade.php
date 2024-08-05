@extends('layouts.app')

@section('template_title')
    Reportes
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white text-center">
                    <h4>{{ __('Generar Reporte') }}</h4>
                </div>
                <div class="card-body bg-light">
                @if(session()->has('error'))
        <div class="alert alert-info col-md-12">{{ session()->get('error') }}</div>

@endif
                    <form action="{{ route('reportes.generar') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="fecha_inicio" class="form-label">Fecha de inicio:</label>
                            <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control bg-dark text-white" required>
                        </div>
                        <div class="mb-4">
                            <label for="fecha_fin" class="form-label">Fecha de fin:</label>
                            <input type="date" id="fecha_fin" name="fecha_fin" class="form-control bg-dark text-white" required>
                        </div>
                        <div class="mb-4">
                            <label for="tipo_reporte" class="form-label">Tipo de reporte:</label>
                            <select id="tipo_reporte" name="tipo_reporte" class="form-select bg-dark text-white" required>
                                <option value="prisioneros">Prisioneros</option>
                                <option value="visitantes">Visitantes</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="export" class="form-label">Exportar como:</label>
                            <select id="export" name="export" class="form-select bg-dark text-white" required>
                                <option value="pdf">PDF</option>
                                <option value="excel">Excel</option>
                            </select>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger btn-lg">Generar Reporte</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        border-radius: 10px;
        border: 2px solid #343a40;
        overflow: hidden;
    }
    .card-header {
        background-color: #212529;
        color: #fff;
        font-weight: bold;
        border-bottom: 2px solid #dc3545;
    }
    .form-label {
        font-weight: bold;
        color: #212529;
    }
    .form-control, .form-select {
        border-radius: 5px;
        border: 1px solid #343a40;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
    .container {
        max-width: 700px;
    }
</style>
@endpush
