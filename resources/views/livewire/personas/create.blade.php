<div class="container">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Registrar una persona</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col">
                    <label>Nombres
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('nombre') is-invalid @enderror"
                        wire:model="nombre" placeholder="">
                    @error('nombre')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Apellido paterno
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('ape_paterno') is-invalid @enderror"
                        wire:model="ape_paterno" placeholder="">
                    @error('ape_paterno')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Apellido materno
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('ape_materno') is-invalid @enderror"
                        wire:model="ape_materno" placeholder="">
                    @error('ape_materno')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label>Documento de identidad
                        <code>*</code></label>
                    <input type="number"
                        class="form-control form-control-border border-width-2 @error('dni') is-invalid @enderror"
                        wire:model="dni" placeholder="">
                    @error('dni')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Número de celular
                        <code>*</code></label>
                    <input type="number"
                        class="form-control form-control-border border-width-2 @error('telefono') is-invalid @enderror"
                        wire:model="telefono" placeholder="">
                    @error('telefono')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Sexo
                        <code>*</code></label>
                    <select
                        class="custom-select form-control-border border-width-2 @error('sexo') is-invalid @enderror"
                        wire:model="sexo">
                        <option selected>Seleccionar...</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                    </select>
                    @error('sexo')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Fecha de nacimiento
                        <code>*</code></label>
                    <input type="date"
                        class="form-control form-control-border border-width-2 @error('fe_nacimiento') is-invalid @enderror"
                        wire:model="fe_nacimiento" placeholder="">
                    @error('fe_nacimiento')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label>Correo Electronico
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('email') is-invalid @enderror"
                        wire:model="email" placeholder="">
                    @error('email')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                <label>Estado Civil
                        <code>*</code></label>
                    <select 
                        class="custom-select form-control-border border-width-2 @error('es_civil') is-invalid @enderror"
                        wire:model="es_civil">
                        <option selected >Seleccionar...</option>
                        <option value="1">Soltero</option>
                        <option value="2">Casado</option>
                        <option value="3">Divorciado</option>
                        <option value="4">Viudo</option>
                    </select>
                    @error('es_civil')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Direccion
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('direccion') is-invalid @enderror"
                        wire:model="direccion" placeholder="">
                    @error('direccion')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="form-group col">
                    <label>Familiares
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('fa_parentesco') is-invalid @enderror"
                        wire:model="fa_parentesco" placeholder="">
                    @error('fa_parentesco')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group col">
                    <label>Parentesco
                        <code>*</code></label>
                    <input type="text"
                        class="form-control form-control-border border-width-2 @error('parentesco') is-invalid @enderror"
                        wire:model="parentesco" placeholder="">
                    @error('parentesco')
                    <small class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-secondary btn-block" href="{{route('personas.index')}}">
                Cancelar
            </a>
            <button class="btn btn-success btn-block" wire:click="create" type="button" wire:loading.attr="disabled" wire:target="create">
                Registrar <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                    wire:loading></span>
            </button>
        </div>
    </div>
</div>
