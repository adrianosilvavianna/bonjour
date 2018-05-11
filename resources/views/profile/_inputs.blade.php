<div class="row">
    <div class="col-md-12 {{ $errors->has('name') ? ' has-error' : '' }}">
        <div class="form-group label-floating">
            <label class="control-label">{{ nome }}</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>
        @if ($errors->has('name'))
            <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('name') }}</strong>
                                </span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-2 {{ $errors->has('age') ? ' has-error' : '' }}">
        <div class="form-group label-floating">
            <label class="control-label">{{ idade }}</label>
            <input type="number" name="age" class="form-control age" value="{{ old('age') }}">
        </div>
        @if ($errors->has('age'))
            <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('age') }}</strong>
                                </span>
        @endif
    </div>
    <div class="col-md-6">
        <div class="form-group label-floating">
            <label class="control-label">{{ genero }}</label>
            <select type="text" name="gender" class="form-control">
                <option value="0">{{ feminino }}</option>
                <option value="1">{{ masculino }}</option>
            </select>
        </div>
    </div>
    <div class="col-md-4 {{ $errors->has('phone') ? ' has-error' : '' }}">
        <div class="form-group label-floating">
            <label class="control-label">{{ telefone }}</label>
            <input type="text" name="phone" class="form-control phone_with_ddd" value="{{ old('phone') }}">
        </div>
        @if ($errors->has('phone'))
            <span class="help-block">
                <strong class="red-text ">{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <label>
            <input name="is_immigrant" type="radio" />
            <span>Sou Imigrante</span>
        </label>
    </div>

    <div class="col-md-6 {{ $errors->has('whats_app') ? ' has-error' : '' }}">
            <div class="form-group label-floating">
                <label class="control-label">{{ whats_app }}</label>
                <input type="text" name="whats_app" class="form-control whats_app_with_ddd" value="{{ old('whats_app') }}">
            </div>
        @if ($errors->has('whats_app'))
            <span class="help-block">
            <strong class="red-text ">{{ $errors->first('whats_app') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="row">

    <div class="col-md-6 {{ $errors->has('cpf') ? ' has-error' : '' }}">
        <div class="form-group label-floating">
            <label class="control-label">CPF</label>
            <input type="text" name="last_name" class="form-control" value="{{ old('cpf') }}">
        </div>
        @if ($errors->has('cpf'))
            <span class="help-block">
                <strong class="red-text">{{ $errors->first('cpf') }}</strong>
            </span>
        @endif
    </div>

    <div class="col-md-6 {{ $errors->has('rg') ? ' has-error' : '' }}">
        <div class="form-group label-floating">
            <label class="control-label">RG</label>
            <input type="text" name="last_name" class="form-control" value="{{ old('rg') }}">
        </div>
        @if ($errors->has('rg'))
            <span class="help-block">
                <strong class="red-text">{{ $errors->first('rg') }}</strong>
            </span>
        @endif
    </div>

    <div class="col-md-6 {{ $errors->has('rne') ? ' has-error' : '' }}">
        <div class="form-group label-floating">
            <label class="control-label">RNE</label>
            <input type="text" name="last_name" class="form-control" value="{{ old('rne') }}">
        </div>
        @if ($errors->has('rne'))
            <span class="help-block">
                <strong class="red-text">{{ $errors->first('rne') }}</strong>
            </span>
        @endif
    </div>
    
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <div class="form-group label-floating">
                <label class="control-label">{{ sobreVoce }}</label>
                <textarea class="form-control" name="about">{{ old('about') }}</textarea>
            </div>
        </div>
    </div>
    <div class="col-md-4 {{ $errors->has('photo_address') ? ' has-error' : '' }}">
        <label>Foto</label>
        <div class="file-field input-field">
            <input type="file" class="btn btn-default" name="photo_address">
        </div>
        @if ($errors->has('photo_address'))
            <span class="help-block">
                                    <strong class="red-text ">{{ $errors->first('photo_address') }}</strong>
                                </span>
        @endif
    </div>
</div>