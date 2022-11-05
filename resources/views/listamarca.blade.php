@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                    <div class="col-9 fs-3">Marcas de Teléfonos</div>
                    <div class="col-3 float-end"><a href="{{ route('creaMarca')}}"><button class="btn btn-sm btn-success float-end">Agregar Marca</button></a></div>

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
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brands as $brand)
                            <tr>
                                <th scope="row">{{ $brand->id }}</th>
                                <td>{{ $brand->brandName }}</td>
                                <td width="100"><a href="{{route('editMarca', [$brand->id])}}"><i class="far fa-edit fs-2 float-end"></i></a> </td>
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