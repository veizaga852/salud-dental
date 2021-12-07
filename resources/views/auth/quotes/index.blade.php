@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrarModal">
                    Nueva cita
                </button>
            </p>    
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
            <div class="card-header">Citas</div>
            <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quotes as $quote)
                    <tr>
                        <td>{{ $quote->date }}</td>
                        <td>{{ $quote->time }}</td>
                        <td>
                            @if($quote->state == "Reservado")
                                <span class="badge bg-info"><h6>{{ $quote->state }}</h6></span>
                            @else
                                <span class="badge bg-secondary"><h6>{{ $quote->state }}</h6></span>
                            @endif
                        </td>
                        <td>

                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editquote" data-id="{{ $quote->id }}" data-client_id="{{ $quote->client_id }}" data-treatment_id="{{ $quote->treatment_id }}" data-date="{{ $quote->date }}" data-time="{{ $quote->time }}" data-state="{{ $quote->state }}">
                                Editar
                            </button>

                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#deletequote" data-id="{{ $quote->id }}">
                                Eliminar
                            </button>

                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detallequote" data-id="{{ $quote->id }}" data-client_id="{{ $quote->client_id }}" data-treatment_id="{{ $quote->treatment_id }}" data-date="{{ $quote->date }}" data-time="{{ $quote->time }}" data-state="{{ $quote->state }}">
                                Detalles
                            </button>

                        </td>
                    </tr>
                    @endforeach      
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="registrarModal" tabindex="-1" role="dialog" aria-labelledby="registrarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registrarModalLabel">Registrar cita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('quotes.store') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="recipient-name" class="col-md-4 col-form-label text-md-right">Cliente</label>
                        <div class="col-md-6">
                            <select class="form-control" id="client_id" name="client_id">
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach    
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="recipient-name" class="col-md-4 col-form-label text-md-right">Tratamiento</label>
                        <div class="col-md-6">
                            <select class="form-control" id="treatment_id" name="treatment_id">
                                @foreach($treatments as $treatment)
                                    <option value="{{ $treatment->id }}">{{ $treatment->name }}</option>
                                @endforeach    
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="recipient-name" class="col-md-4 col-form-label text-md-right">Fecha</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message-text" class="col-md-4 col-form-label text-md-right">Hora</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="time" name="time">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message-text" class="col-md-4 col-form-label text-md-right">Estado</label>
                        <div class="col-md-6">
                            <select class="form-control" id="state" name="state">
                                <option>Reservado</option>
                                <option>Cancelado</option>    
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editquote" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarModalLabel">Editar cita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="PUT" action="{{ route('quotes.update', $quote->id) }}">
                    @csrf 
                    <div hidden class="form-group row">
                        <label for="recipient-name" class="col-md-4 col-form-label text-md-right">id</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="id" name="id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="recipient-name" class="col-md-4 col-form-label text-md-right">Cliente</label>
                        <div class="col-md-6">
                            <select class="form-control" id="client_id" name="client_id">
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach    
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="recipient-name" class="col-md-4 col-form-label text-md-right">Tratamiento</label>
                        <div class="col-md-6">
                            <select class="form-control" id="treatment_id" name="treatment_id">
                                @foreach($treatments as $treatment)
                                    <option value="{{ $treatment->id }}">{{ $treatment->name }}</option>
                                @endforeach    
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="recipient-name" class="col-md-4 col-form-label text-md-right">Fecha</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message-text" class="col-md-4 col-form-label text-md-right">Hora</label>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="time" name="time">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message-text" class="col-md-4 col-form-label text-md-right">Estado</label>
                        <div class="col-md-6">
                            <select class="form-control" id="state" name="state">
                                <option>Reservado</option>
                                <option>Cancelado</option>    
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deletequote" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarModalLabel">¿Seguro que deseas eliminarlo?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="DELETE" action="{{ route('quotes.destroy', $quote->id) }}">
                    @csrf 
                    <div hidden class="form-group">
                        <label for="recipient-name" class="col-form-label">id</label>
                        <input type="text" class="form-control" id="id" name="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Si, eliminalo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detallequote" tabindex="-1" role="dialog" aria-labelledby="detalleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detalleModalLabel">Factura</h5>
                <button type="button" class="close d-print-none" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="" action="">
                    <label for="">Detalles cliente</label>
                    <div class="form-group row">
                        <label for="recipient-name" class="col-md-2 col-form-label text-md-right">Nombre</label>
                        <div class="col-md-4">
                            <select disabled class="form-control" id="client_id" name="client_id">
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach    
                            </select>
                        </div>
                        <label for="recipient-name" class="col-md-2 col-form-label text-md-right">CI</label>
                        <div class="col-md-4">
                            <select disabled class="form-control" id="client_id" name="client_id">
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->ci }}</option>
                                @endforeach    
                            </select>
                        </div>
                    </div>
                    <label for="">Detalles tratamiento</label>
                    <div class="form-group row">
                        <label for="recipient-name" class="col-md-2 col-form-label text-md-right">Nombre</label>
                        <div class="col-md-4">
                            <select disabled class="form-control" id="treatment_id" name="treatment_id">
                                @foreach($treatments as $treatment)
                                    <option value="{{ $treatment->id }}">{{ $treatment->name }}</option>
                                @endforeach    
                            </select>
                        </div>
                        <label for="recipient-name" class="col-md-2 col-form-label text-md-right">Costo</label>
                        <div class="col-md-4">
                            <select disabled class="form-control" id="treatment_id" name="treatment_id">
                                @foreach($treatments as $treatment)
                                    <option value="{{ $treatment->id }}">{{ $treatment->cost }}</option>
                                @endforeach    
                            </select>
                        </div>
                    </div>
                    <label for="">Detalles fecha/hora</label>
                    <div class="form-group row">
                        <label for="recipient-name" class="col-md-2 col-form-label text-md-right">Fecha</label>
                        <div class="col-md-4">
                            <input disabled type="date" class="form-control" id="date" name="date">
                        </div>
                        <label for="message-text" class="col-md-2 col-form-label text-md-right">Hora</label>
                        <div class="col-md-4">
                            <input disabled type="time" class="form-control" id="time" name="time">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary d-print-none" data-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary d-print-none" id="printButton">Imprimir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
