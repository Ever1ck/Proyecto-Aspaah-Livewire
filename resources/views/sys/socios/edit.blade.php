@extends('adminlte::page')

@section('title', 'Socios')

@section('plugins.Sweetalert2', true)

@section('content_header')

<div class="row">
    <div class="col-sm-6">
        <h1>Editar Socio</h1>
    </div>
    <div class="col-sm-6 d-none d-sm-block">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="/socios">Socios</a></li>
            <li class="breadcrumb-item"><a href="/socios/{{$id}}/edit">Editar</a></li>
        </ol>
    </div>
</div>

@stop

@section('content')

@livewire('socios.edit', ['id' => $id])

<x-livewire-alert::scripts />
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>   
    $(document).ready(function (e) {   
        $('#imagen').change(function(){            
            let reader = new FileReader();
            reader.onload = (e) => { 
                $('#imagenSeleccionada').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    });
</script>

@stop
