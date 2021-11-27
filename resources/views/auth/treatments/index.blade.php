@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registrarModal">
                    Nuevo tratamiento
                </button>

                <div class="modal fade" id="registrarModal" tabindex="-1" role="dialog" aria-labelledby="registrarModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title" id="registrarModalLabel">Registrar tratamiento</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form method="POST" action="{{ route('treatments.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Nombre</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Costo</label>
                                        <input type="text" class="form-control" id="cost" name="cost">
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Descripción</label>
                                        <input type="text" class="form-control" id="description" name="description">
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
            <div class="card-header">Tratamientos</div>
            <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Costo</th>
                        <th>Descripcion</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($treatments as $treatment)
                    <tr>
                        <th>{{ $treatment->id }}</th>
                        <td>{{ $treatment->name }}</td>
                        <td>{{ $treatment->cost }}</td>
                        <td>{{ $treatment->description }}</td>
                        <td>

                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edittreatment" data-id="{{ $treatment->id }}" data-name="{{ $treatment->name }}" data-cost="{{ $treatment->cost }}" data-description="{{ $treatment->description }}">
                                Editar
                            </button>

                            <div class="modal fade" id="edittreatment" tabindex="-1" role="dialog" aria-labelledby="editarModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editarModalLabel">Editar tratamiento</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form method="PUT" action="{{ route('treatments.update', $treatment->id) }}">
                                                @csrf 
                                                <div hidden class="form-group">
                                                    <label for="recipient-name" class="col-form-label">id</label>
                                                    <input type="text" class="form-control" id="id" name="id">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="name" name="name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Costo</label>
                                                    <input type="text" class="form-control" id="cost" name="cost">
                                                </div>
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label">Descripción</label>
                                                    <input type="text" class="form-control" id="description" name="description">
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

                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#deletetreatment" data-id="{{ $treatment->id }}">
                                Eliminar
                            </button>

                            <div class="modal fade" id="deletetreatment" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="eliminarModalLabel">¿Seguro que deseas eliminarlo?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form method="DELETE" action="{{ route('treatments.destroy', $treatment->id) }}">
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
