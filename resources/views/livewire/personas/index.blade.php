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
            <a type="button" class="btn btn-outline-warning px-4" href="{{route('personas.pdf')}}">
                Exportar <i class="far fa-file-pdf fa-lg ml-1"></i></a>
            <a type="button" class="btn btn-outline-success px-4" href="{{route('personas.excel')}}">
                Exportar <i class="far fa-file-excel fa-lg ml-1"></i></a>
        </div>

        <a class="btn btn-success" href="{{route('personas.create')}}">
            <i class="fas fa-plus mr-1"></i> Registrar persona
        </a>
    </div>

    <table class="table mt-3">
        <thead>
            <tr class="text-center">
                <th>Cod.</th>
                <th>Nombres y apellidos</th>
                <th>DNI</th>
                <th>Número</th>
                <th>Sexo</th>
                <th>Fecha de nacimiento</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personas as $persona)
            <tr class="text-center">
                <td>{{ $persona->id_persona }}</td>
                <td>{{ $persona->nombre }} {{ $persona->ape_paterno }} {{ $persona->ape_materno }}</td>
                <td>{{ $persona->dni }}</td>
                <td>{{ $persona->telefono }}</td>
                <td>
                    @if ($persona->sexo == '1')
                    <i class="fas fa-mars text-info fa-2x"></i>
                    @else
                    <i class="fas fa-venus text-danger fa-2x"></i>
                    @endif
                </td>
                <td>{{ $persona->fe_nacimiento }}</td>
                <td class="text-center">
                    <div class="btn-group" role="group">
                        <a href="{{route('personas.show', $persona->id_persona)}}" type="button"
                            class="btn btn-sm btn-info"><i class="align-middle" data-feather="eye"></i>
                            Ver</a>
                        <a href="{{route('personas.edit', $persona->id_persona)}}" type="button"
                            class="btn btn-sm btn-warning"><i class="align-middle" data-feather="eye"></i>
                            Editar</a>
                        <button wire:click="delete({{ $persona->id_persona }})"
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
