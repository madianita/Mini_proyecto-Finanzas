<div>
    @include('livewire.admin.categorias.modals.create')

    @section('breadcrumb')
    <span class="text-muted fw-light">Listado de <strong>Categorias</strong></span>

    @endsection

    @section('title', 'Categorias')
    @section('content')
    {{-- <div class="row" wire:ignore.self>
        <div class="col-lg-12">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#create-modal">Crear</button>
        </div>
    </div> --}}

    <div class="card" >
        <center><div class="col-lg-5">
            <form>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" wire:model="nombre" required>
                </div>

                <button wire:click='store()' type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div></center>
    </div>

    <div class="col-lg-12 mt-5">
        <div class="table-responsive">
            <table class=" table table-stripped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $item)
                    <tr>
                        <td>{{ $item->nombre }}</td>
                        <td>
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#show-modal"
                                wire:click='show({{ $item->id }})'>Ver</button>
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit-modal"
                                wire:click='edit({{ $item->id }})'>Editar</button>
                            <button class="btn btn-danger btn-sm"
                            data-bs-toggle="modal" data-bs-target="#delete-modal"
                                wire:click='delete({{ $item->id }})'>Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
</div>
