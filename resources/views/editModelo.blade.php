@extends('layouts.app')

@section('content')
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="//cdn.ckeditor.com/4.20.0/basic/ckeditor.js"></script>
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
        //CKEditor
        $('.ckeditor').ckeditor();
    });
</script>
@endpush

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header fs-3">Editar Modelo</div>

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

                    <form method="POST" action=" {{ route('updateModelo')}}" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{$modelo->id}}">
                        @csrf
                        <div class="mb-3">
                            <label for="phoneName" class="form-label text-md-right">{{ __('Modelo') }}</label>
                            <div class="col-md-7">
                                <input id="phoneName" type="text" class="form-control{{ $errors->has('phoneName ') ? ' is-invalid' : '' }}" name="phoneName" value="{{$modelo->phoneName}}" required data-error="Modelo" placeholder="ejemplo: Galaxy S22, iPhone 14, Redmi Note">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="brandId">{{ __('Marca') }}</label>
                            <div class="col-md-7">
                                <select class="form-control" name="brandId" required>
                                    <option value="">Seleccione --></option>
                                    @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}" {{ ($modelo->brandId==$brand->id) ? ' selected' : ''}}>{{$brand->brandName}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group mb-1">
                            <label for="overview">{{ __('Descripci??n') }}</label>
                            <textarea id="overview" class="ckeditor form-control-sm form-control{{ $errors->has('overview') ? ' is-invalid' : '' }}" name="overview" required data-error="Descripci??n">{{$modelo->overview}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="quantity">{{ __('Cantidad') }}</label>
                            <input id="quantity" type="number" pattern="[0-9]" onkeypress="return event.charCode >= 48 && event.charCode <= 57" step="1" min="0" class="form-control-sm form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" value="{{$modelo->quantity}}" required data-error="Cantidad Existente" placeholder="ejemplo: 2000">
                        </div>
                        <div class="mb-3">
                            <label for="modelLogo" class="form-label text-md-right">{{ __('Logo') }}</label>
                            <div class="col-md-7">
                                <input class="form-control" type="file" id="modelLogo" name="modelLogo" accept="image/*">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Tel??fono</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection