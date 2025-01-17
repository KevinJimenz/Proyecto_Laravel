@extends('layouts.app')

@section('template_title')
    Prisioneros
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Prisioneros') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('prisioneros.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo') }}
                                </a>
                              </div>
                        </div>
                    </div>
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
                                        
									<th >Nombre Completo</th>
									<th >Fecha Nacimiento</th>
									<th >Fecha Ingreso</th>
									<th >Delito Cometido</th>
									<th >Celda Asignada</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prisioneros as $prisionero)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
										<td >{{ $prisionero->nombre_completo }}</td>
										<td >{{ $prisionero->fecha_nacimiento }}</td>
										<td >{{ $prisionero->fecha_ingreso }}</td>
										<td >{{ $prisionero->delito_cometido }}</td>
										<td >{{ $prisionero->celda_asignada }}</td>

                                            <td>
                                                <form action="{{ route('prisioneros.destroy', $prisionero->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('prisioneros.show', $prisionero->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('prisioneros.edit', $prisionero->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
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
                {!! $prisioneros->withQueryString()->links() !!}
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