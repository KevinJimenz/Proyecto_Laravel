@extends('layouts.app')

@section('template_title')
    Visitas
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Visitas') }}
                            </span>

                             <div class="float-right">
          
                                <a href="{{ route('visitas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    <!-- Agregar este formulario de búsqueda -->

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="miTabla">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
									<th >Prisionero Id</th>
									<th >Visitante Id</th>
									<th >Fecha Hora Inicio</th>
									<th >Fecha Hora Fin</th>
									<th >Guardia Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($visitas as $visita)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $visita->prisionero_id }}</td>
										<td >{{ $visita->visitante_id }}</td>
										<td >{{ $visita->fecha_hora_inicio }}</td>
										<td >{{ $visita->fecha_hora_fin }}</td>
										<td >{{ $visita->guardia_id }}</td>

                                            <td>
                                                <form action="{{ route('visitas.destroy', $visita->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('visitas.show', $visita->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('visitas.edit', $visita->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $visitas->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('#miTabla').DataTable();
        });
    </script>
@endpush