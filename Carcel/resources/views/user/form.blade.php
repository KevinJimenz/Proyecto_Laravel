<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="identificacion" class="form-label">{{ __('Identificacion') }}</label>
            <input type="text" name="identificacion" class="form-control @error('identificacion') is-invalid @enderror" value="{{ old('identificacion', $user?->identificacion) }}" id="identificacion" placeholder="Identificacion">
            {!! $errors->first('identificacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">{{ __('Nombre') }}</label>
            <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre', $user?->nombre) }}" id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="rol" class="form-label">{{ __('Rol') }}</label>
            <input type="text" name="rol" class="form-control @error('rol') is-invalid @enderror" value="{{ old('rol', $user?->rol) }}" id="rol" placeholder="Rol">
            {!! $errors->first('rol', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>