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
                <div class="card-header">Crear Nueva Marca</div>

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

                    <form method="POST" action=" {{ route('saveMarca')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="brandName" class="form-label text-md-right">{{ __('Marca') }}</label>
                            <div class="col-md-7">
                                <input id="brandName" type="text" class="form-control{{ $errors->has('brandName') ? ' is-invalid' : '' }}" name="brandName" value="{{old('brandName')}}" required data-error="Marca" placeholder="ejemplo: Samsung, Apple, Xiaomi">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="origin" class="form-label text-md-right">{{ __('País de Origen') }}</label>
                            <div class="col-md-7">
                                <input id="origin" type="text" class="form-control{{ $errors->has('origin') ? ' is-invalid' : '' }}" name="origin" value="{{old('origin')}}" required data-error="País de OPrigen" placeholder="ejemplo: China, EEUU">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="brandLogo" class="form-label text-md-right">{{ __('Logo') }}</label>
                            <div class="col-md-7">
                            <input class="form-control" type="file" id="brandLogo" name="brandLogo" accept="image/*">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Marca</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection