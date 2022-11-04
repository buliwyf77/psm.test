@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inventario General</div>

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
                                <th scope="col">Cantidad</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($telefonos as $telefono)
                            <tr>
                                <th scope="row">{{ $telefono->id }}</th>
                                <td>{{ $telefono->PhoneBrands->brandName }}</td>
                                <td>{{ $telefono->phoneName }}</td>
                                <td><span id="q{{$telefono->id}}">{{ $telefono->quantity }}</span></td>
                                <td>
                                    <i class="fa-solid fa-plus fs-2 changeInventory" data-id="{{$telefono->id}}" data-action="plus" style="cursor:pointer"></i>
                                    &nbsp;
                                    <i class="fa-solid fa-minus fs-2 changeInventory" data-id="{{$telefono->id}}" data-action="minus" style="cursor:pointer"></i>
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
<script>
    $(function(){
        $('.changeInventory').click(function(){
            var button = $(this);
            var id = button.data('id');
            var accion = button.data('action');
            $.ajax({
                type: "get",
                url: "changeInventory/" + id + "/" + accion,
                success: function(data) {
                    ($('#q'+id).html(data));
                    if(data<=3){
                        $('#q'+id).addClass('text-danger').addClass('fs-3')
                    }
                    else{
                        $('#q'+id).removeClass('text-danger').removeClass('fs-3')
                    }
                }
            });
            


        });
    })
</script>
@endsection