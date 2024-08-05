@extends('layouts.app')

@section('template_title')
    {{ $visita->name ?? __('Show') . " " . __('Visita') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Visita</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('visitas.index') }}"> {{ __('Atras') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>Prisionero Id:</strong>
                                    @if($visita)
                                    {{ $visita->prisionero_id }}
                                    @else
                                    <p>No hay datos disponibles</p>
                                    @endif
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Visitante Id:</strong>
                                    @if($visita)
                                    {{ $visita->visitante_id }}
                                    @else
                                    <p>No hay datos</p>
                                    @endif
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Hora Inicio:</strong>
                                    @if($visita)
                                    {{ $visita->fecha_hora_inicio }}
                                    @else
                                    <p>No hay datos</p>
                                    @endif
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Fecha Hora Fin:</strong>
                                    @if($visita)
                                    {{ $visita->fecha_hora_fin }}
                                    @else
                                    <p>No hay datos</p>
                                    @endif
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Guardia Id:</strong>
                                    @if($visita)
                                    {{ $visita->guardia_id }}
                                    @else
                                    <p>No hay datos</p>
                                    @endif
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
