@extends('layouts.layout')

@section('title')
    <title>Actualizar paciente | Ayelen</title>
@endsection

@section('content')
<form action="{{route('pacientes.update', $paciente->id)}}" method="POST">
    @csrf
    @method('PUT')
    <div class="row mt-4 bg-light border border-dark p-md-4 p-2 rounded mx-auto justify-content-evenly" style="max-width: 1000px;">
        <h4 class="pb-3 border-bottom border-dark">Actualizar paciente</h4>
        <div class="col-md-5">
            <div class="mb-3 row">
                <label for="nombrepac" class="col-sm-4 col-form-label">Nombre</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('nombrepac') is-invalid @enderror" value="{{$paciente->nombre}}" name="nombrepac" id="nombrepac"
                    placeholder="Ingrese nombre" disabled>
                    @error('nombrepac')
                        <div id="nombrepac" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="mb-3 row">
                <label for="chip" class="col-sm-4 col-form-label text-nowrap">N° de microchip</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control @error('chip') is-invalid @enderror" value="{{$paciente->chip}}" name="chip" id="chip"
                    placeholder="Ingrese microchip" required>
                    @error('chip')
                        <div id="chip" class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        
        <button class="btn btn-primary mt-4" style="max-width: 400px;">Actualizar</button>
    
    </div>
</form>


@endsection