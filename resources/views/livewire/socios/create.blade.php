

<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Registrar un socio</h3>
        </div>
        <div class="card-body flex">
            <div class="col-sm-8">
                <div class="row">
                    <div class="form-group col">
                        <label>Persona
                            <code>*</code></label>
                        <select 
                            class="custom-select form-control-border border-width-2 @error('personas_id') is-invalid @enderror"
                            wire:model='personas_id'>
                            <option selected >Seleccionar...</option>
                                @foreach($personas as $item)
                            <option value="{{ $item->id_persona }}">{{ $item->nombre }}</option>
                            @endforeach
                        </select>
                        @error('personas_id')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label>Codigo
                            <code>*</code></label>
                        <input type="text"
                            class="form-control form-control-border border-width-2 @error('codigo') is-invalid @enderror"
                            wire:model="codigo" placeholder="">
                        @error('codigo')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label>Tipo
                            <code>*</code></label>
                        <input type="text"
                            class="form-control form-control-border border-width-2 @error('tipo') is-invalid @enderror"
                            wire:model="tipo" placeholder="">
                        @error('tipo')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label>Categoria
                            <code>*</code></label>
                        <input type="text"
                            class="form-control form-control-border border-width-2 @error('categoria') is-invalid @enderror"
                            wire:model="categoria" placeholder="">
                        @error('categoria')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label>Comunidad
                            <code>*</code></label>
                        <input type="text"
                            class="form-control form-control-border border-width-2 @error('comunidad') is-invalid @enderror"
                            wire:model="comunidad" placeholder="">
                        @error('comunidad')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <label>Departamento
                            <code>*</code></label>
                        <select 
                            class="custom-select form-control-border border-width-2 @error('departamento_id') is-invalid @enderror"
                            wire:model="departamento_id">
                            <option selected >Seleccionar...</option>
                                @foreach($departamentos as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('departamento_id')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col">
                    <label>Provincia
                            <code>*</code></label>
                        <select 
                            class="custom-select form-control-border border-width-2 @error('provincia_id') is-invalid @enderror"
                            wire:model="provincia_id">
                            <option selected >Seleccionar...</option>
                            @foreach($provincias as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('provincia_id')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label>Distrito
                            <code>*</code></label>
                        <select 
                            class="custom-select form-control-border border-width-2 @error('distrito_id') is-invalid @enderror"
                            wire:model="distrito_id">
                            <option selected >Seleccionar...</option>
                            @foreach($distritos as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('distrito_id')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="grid grid-cols-1 mt-5 mx-7" style="height: 300px;">
                @if ($imagen)
                imagen Preview:
                <img src="{{ $imagen->temporaryUrl() }}">
                @endif 
                </div>
                <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold mb-1">Subir Imagen</label>
                        <div class='flex items-center justify-center w-full'>
                        <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                            <div class='flex flex-col items-center justify-center pt-7'>
                            <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <p class='text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Seleccione la imagen</p>
                        </div>
                        <input name="imagen" id="imagen" type="file" wire:model="imagen" class="hidden">
                        
                        </label>
                        </div>
                    </div>
                </div>
            </div>
        <div class="card-footer">
            <a class="btn btn-secondary btn-block" href="{{route('socios.index')}}">
                Cancelar
            </a>
            <button class="btn btn-success btn-block" wire:click="create" type="button" wire:loading.attr="disabled" wire:target="create">
                Registrar <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                    wire:loading></span>
            </button>
        </div>
    </div>
</div>
