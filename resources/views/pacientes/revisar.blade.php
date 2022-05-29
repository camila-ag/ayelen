@extends('layouts.layout')

@section('title')
    <title>Historial de {{$paciente->nombre}} | Ayelen</title>
@endsection

@section('content')

<div class="row mt-4 justify-content-evenly">    
    <div class="col-md-4 mb-3">
        <div class="border border-dark py-2 px-3 shadow rounded bg-light">
            <div class="row border-bottom border-dark">
                <div class="col-8">
                    <h4 class="">Datos propietario</h4>
                </div>
                <div class="col-4 text-end pt-1">
                    
                </div>
            </div>
            
            <dl class="row pt-2">
                
                <dt class="col-3">Nombre</dt>
                <dd class="col-9">{{ucwords($propietario->nombre)}}</dd>

                <dt class="col-3">Rut</dt>
                <dd class="col-9">{{$propietario->rut}}</dd>

                <dt class="col-3">Teléfono</dt>
                <dd class="col-9">+56 9 {{$propietario->telefono}}</dd>

                <dt class="col-sm-3">Dirección</dt>
                <dd class="col-sm-9">{{ucwords($propietario->direccion)}}</dd>
                
                
            </dl>
            <div class="row border-bottom border-top pt-2 pb-1 border-dark">
                <div class="col-8">
                    <h4 class="">Datos paciente</h4>
                </div>
                <div class="col-4 text-end pt-1">
                    @if ($paciente->chip == null)
                       <span>Sin microchip</span>
                        <a href="{{route('pacientes.edit', $paciente->id)}}" class="text-decoration-none" style="color: rgba(66, 19, 101);">
                            <i class="fa-solid fa-pen-to-square ms-2 fs-4"></i>
                        </a>
                    @else
                        <span>#{{$paciente->chip}}</span>
                    @endif
                </div>
            </div>

            <dl class="row pt-2">
                <dt class="col-4">Nombre</dt>
                <dd class="col-8">{{ucfirst($paciente->nombre)}}</dd>

                <dt class="col-4">Nacimiento</dt>
                <dd class="col-8">{{date("d/m/Y", strtotime($paciente->nacimiento))}}</dd>

                <dt class="col-3">Especie</dt>
                <dd class="col-3 text-capitalize">{{ucfirst($paciente->especie)}}</dd>

                <dt class="col-3">Sexo</dt>
                <dd class="col-3 text-capitalize">{{ucfirst($paciente->sexo)}}</dd>

                <dt class="col-3">Raza</dt>
                <dd class="col-3 text-capitalize">{{ucfirst($paciente->raza)}}</dd>

                <dt class="col-3">Peso</dt>
                <dd class="col-3">{{$paciente->peso}} kg</dd>     
            </dl>
        </div>
    </div>

    <div class="col-md-7">
        <ul class="nav nav-tabs mt-2 shadow" >
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#historial">Historial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#vacunas">Vacunas</a>
            </li>
        </ul>

        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active show bg-light p-2 rounded-bottom shadow" id="historial">
                <div class="row d-flex justify-content-center text-center mx-auto">
                    <div class="text-end">
                        <a href="{{route('historial.registrar', $paciente->id)}}" class="btn btn-primary">
                            <i class="fa-solid fa-pencil pe-2"></i>
                            Registrar consulta
                        </a>
                    </div>
            
                    @foreach ($historial as $h)
                        <dl class="row border-bottom border-dark mt-2">
                            <dt class="col-sm-3 text-start text-md-end">{{date("d/m/Y", strtotime($h->fecha))}}</dt>
                            <dd class="col-sm-9 fw-bold" style="text-align: justify;">
                                {{$h->motivo}}
                                <a href="{{route('historial.edit', $h->id)}}" class="text-decoration-none">
                                    <i class="fa-solid fa-pen-to-square ms-3 fs-5"></i>
                                    Editar
                                </a>
                            </dd>
                            <dd class="col-sm-3 d-none d-xl-block">
                                <dl class="row">
                                    <dt class="col-7 text-end">T°:</dt>
                                    <dd class="col-5">{{$h->temperatura}} °C</dd>
                                    <dt class="col-7 text-end">Peso:</dt>
                                    <dd class="col-5">{{$h->peso}}</dd>
                                    <dt class="col-7 text-end">CC:</dt>
                                    <dd class="col-5">{{$h->cc}}</dd>
                                </dl>
                            </dd>
                            <div class="row text-center my-2 d-xl-none">
                                <div class="col-4 text-nowrap">
                                    <span class="fw-bold">T°:</span> {{$h->temperatura}} °C
                                </div>
                                <div class="col-4 text-nowrap">
                                    <span class="fw-bold">Peso:</span> {{$h->peso}} kg
                                </div>
                                <div class="col-4 text-nowrap">
                                    <span class="fw-bold">CC:</span>{{$h->cc}} (1-5)
                                </div>
                            </div>
                            <dd class="col-sm-9" style="text-align: justify;">
                                <figure>
                                    <blockquote>
                                        <p>{{$h->tratamiento}}</p>
                                    </blockquote>
                                    <figcaption class="blockquote-footer text-end text-dark fs-6">
                                        Atendido por: {{$h->veterinario}}
                                    </figcaption>
                                </figure>
                            </dd>
                        </dl>
                    @endforeach
                </div>
            </div>


            <div class="tab-pane fade bg-light rounded-bottom shadow p-2 " id="vacunas">
                <div class="row d-flex justify-content-center mx-auto">
                    <div class="text-end">
                        <a href="{{route('vacuna.registrar', $paciente->id)}}" class="btn btn-primary">
                            <i class="fa-solid fa-pencil pe-2"></i>
                            Registrar vacuna
                        </a>
                    </div>

                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Administración</th>
                                <th scope="col">Vacuna</th>
                                <th scope="col">Observaciones</th>
                                <th scope="col">Próxima dosis</th>
                                <th scope="col">Administrada por</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vacunas as $v)
                                <tr class="border-bottom border-dark">
                                    <td class="col-1">{{date("d/m/Y", strtotime($v->fecha_adm))}}</th>
                                    <td>{{$v->vacuna}}, {{$v->marca}}</td>
                                    @if ($v->obs == null)
                                        <td>Ninguna</td>
                                    @else
                                        <td>{{$v->obs}}</td>
                                    @endif
                                    
                                    <td class="col-2">{{date("d/m/Y", strtotime($v->fecha_prox))}}</td>
                                    <td>{{$v->name}}</td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection