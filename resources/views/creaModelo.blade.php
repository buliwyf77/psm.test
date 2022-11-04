@extends('layouts.app')

@section('content')
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("input").each(function(index, element) {
            $(element).on("invalid", function(event) {
                event.target.setCustomValidity("");
                if (!event.target.validity.valid) {
                    elemento = element.getAttribute('data-error') == null ? 'Este valor ' : 'El campo ' + element.getAttribute('data-error');
                    event.target.setCustomValidity(elemento + ' es requerido');
                }
            });

            $(element).on("input", function(event) {
                event.target.setCustomValidity("");
            });
        });

    });
</script>
@endpush

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Nuevo Modelo</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif

                    <form method="POST" action=" {{ route('saveModelo')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="phoneName" class="form-label text-md-right">{{ __('Modelo') }}</label>
                            <div class="col-md-7">
                                <input id="phoneName" type="text" class="form-control{{ $errors->has('phoneName ') ? ' is-invalid' : '' }}" name="phoneName" value="{{old('phoneName')}}" required data-error="Modelo" placeholder="ejemplo: Galaxy S22, iPhone 14, Redmi Note">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="brandId">{{ __('Marca') }}</label>
                            <div class="col-md-7">
                                <select class="form-control" name="brandId">
                                    @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->brandName}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <label for="overview">{{ __('Descripción') }}</label>
                            <textarea id="overview" class="form-control-sm form-control{{ $errors->has('overview') ? ' is-invalid' : '' }}" name="overview" required data-error="Descripción">{{old('overview') ? old('overview') : ''}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="quantity">{{ __('Cantidad') }}</label>
                            <input id="quantity" type="number" pattern="[0-9]" onkeypress="return event.charCode >= 48 && event.charCode <= 57" step="1" min="0" class="form-control-sm form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" value="{{old('quantity')}}" required data-error="Cantidad Existente" placeholder="ejemplo: 2000">
                        </div>
                        <div class="mb-3">
                            <label for="modelLogo" class="form-label text-md-right">{{ __('Logo') }}</label>
                            <div class="col-md-7">
                                <input class="form-control" type="file" id="modelLogo" name="modelLogo" accept="image/*">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Teléfono</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection