@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                    <div class="col-9 fs-3">Modelos de Teléfonos</div>
                    <div class="col-3 float-end"><a href="{{ route('creaModelo')}}"><button class="btn btn-sm btn-success float-end">Agregar Teléfono</button></a></div>
                    </div>

                 
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Modelo</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($models as $model)
                            <tr>
                                <th scope="row">{{ $model->id }}</th>
                                <td>{{ $model->phoneBrands->brandName }}</td>
                                <td>{{ $model->phoneName }}</td>
                                <td width="100">
                                    <a href="{{route('editModelo', [$model->id])}}"><i class="far fa-edit fs-2 gap-1"></i></a> 
                                    <a href="{{route('vermodelo', [$model->id])}}"><i class="fa-solid fa-eye fs-2 float-end gap-1"></i></a> 
                                </td>
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