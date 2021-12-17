<div>
    <div class="mb-3 d-flex justify-content-between row">
        <div class="col-8">
            <x-jet-input placeholder="Buscar socio" type="text" wire:model="palabraBuscar" />
        </div>
        <div class="col-4">
            <div class="form-group">
                <select class="form-control" wire:model="tipoBuscar">
                    <option value="0">Seleccione tipo...</option>
                    <option value="1" selected>Nombres y apellidos</option>
                    <option value="2">DNI</option>
                    <option value="3">Cod.</option>
                </select>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <div class="btn-group" role="group">
            <a type="button" class="btn btn-outline-warning px-4" href="{{route('socios.pdf')}}">
                Exportar <i class="far fa-file-pdf fa-lg ml-1"></i></a>
            <a type="button" class="btn btn-outline-success px-4" href="{{route('socios.excel')}}">
                Exportar <i class="far fa-file-excel fa-lg ml-1"></i></a>
        </div>

        <a class="btn btn-success" href="{{route('socios.create')}}">
            <i class="fas fa-plus mr-1"></i> Registrar Socio
        </a>
    </div>

    <table class="table mt-3">
        <thead>
            <tr class="text-center">
                <th>Id.</th>
                <th>Nombres y apellidos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($socios as $socio)
            <tr class="text-center">
                <td>{{ $socio->id_socios }}</td>
                <td>{{ $socio->persona->nombre }} {{ $socio->persona->ape_paterno }} {{ $socio->persona->ape_materno }}</td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <a href="{{route('socios.show', $socio->id_socios)}}" type="button"
                            class="btn btn-sm btn-info"><i class="align-middle" data-feather="eye"></i>
                            Ver</a>
                        <a href="{{route('socios.edit', $socio->id_socios)}}" type="button"
                            class="btn btn-sm btn-warning"><i class="align-middle" data-feather="eye"></i>
                            Editar</a>
                        <button wire:click="delete({{ $socio->id_socios }})"
                            class="btn btn-danger btn-sm">Eliminar</button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        @if ($links->links())
        {{$links->links()}}
        @endif
    </div>
</div>
