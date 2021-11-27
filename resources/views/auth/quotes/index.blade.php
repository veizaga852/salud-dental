@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrarModal">
                    Nueva cita
                </button>

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
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Cliente</label>
                                        <select class="form-control" id="client_id" name="client_id">
                                            @foreach($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->ci }} - {{ $client->name }}</option>
                                            @endforeach    
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Tratamiento</label>
                                        <select class="form-control" id="treatment_id" name="treatment_id">
                                            @foreach($treatments as $treatment)
                                                <option value="{{ $treatment->id }}">{{ $treatment->name }}</option>
                                            @endforeach    
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Fecha</label>
                                        <input type="text" class="form-control" id="date" name="date">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Hora</label>
                                        <input type="text" class="form-control" id="time" name="time">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Estado</label>
                                        <input type="text" class="form-control" id="state" name="state">
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
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quotes as $quote)
                    <tr>
                        <th>{{ $quote->id }}</th>
                        <td>{{ $quote->date }}</td>
                        <td>{{ $quote->time }}</td>
                        <td>
                            @if($quote->state == "Reservado")
                                <span class="btn btn-info">{{ $quote->state }}</span>
                            @else
                                <span class="btn btn-secondary">{{ $quote->state }}</span>
                            @endif
                        </td>
                        <td>

                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editquote" data-id="{{ $quote->id }}" data-client_id="{{ $quote->client_id }}" data-treatment_id="{{ $quote->treatment_id }}" data-date="{{ $quote->date }}" data-time="{{ $quote->time }}" data-state="{{ $quote->state }}">
                                Editar
                            </button>

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
                                                <div hidden class="form-group">
                                                    <label for="recipient-name" class="col-form-label">id</label>
                                                    <input type="text" class="form-control" id="id" name="id">
                                                </div>

                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Cliente</label>
                                                    <select class="form-control" id="client_id" name="client_id">
                                                        @foreach($clients as $client)
                                                            <option value="{{ $client->id }}">{{ $client->ci }} - {{ $client->name }}</option>
                                                        @endforeach    
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Tratamiento</label>
                                                    <select class="form-control" id="treatment_id" name="treatment_id">
                                                        @foreach($treatments as $treatment)
                                                            <option value="{{ $treatment->id }}">{{ $treatment->name }}</option>
                                                        @endforeach    
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Fecha</label>
                                                    <input type="text" class="form-control" id="date" name="date">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Hora</label>
                                                    <input type="text" class="form-control" id="time" name="time">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Estado</label>
                                                    <input type="text" class="form-control" id="state" name="state">
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

                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#deletequote" data-id="{{ $quote->id }}">
                                Eliminar
                            </button>

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

                        </td>
                    </tr>
                    @endforeach      
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>

@endsection
