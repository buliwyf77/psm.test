@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 fs-3">{{$model->phoneBrands->brandName}} {{$model->phoneName}}</div>

                    </div>


                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-5"><img src="{{asset('images/productImages/'.$model->modelLogo)}}" class="rounded img-fluid" onerror='this.src="{{asset('images/productImages/noimage.jpg')}}"''></div>
                        <div class="col-7">
                            <p class="fs-6">{{$model->overview}}</p>
                            <hr>
                            <p class="fs-6">Cantidad disponible: {{$model->quantity}}</p>
                            <small>Ultima modificacion:  {{ \Carbon\Carbon::parse($model->updated_at)->diffForHumans() }}</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mx-auto text-center pt-5">
                            <button class="btn btn-sm btn-success" onclick="javascript:history.back()">Regresar</button>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>

@endsection