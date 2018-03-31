@section('css')
    @parent
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    @show

<div class="row">
    <div class="col-md-12 {{ $errors->has('country_birth') ? ' has-error' : '' }}">
        <div class="form-group label-floating">
            <label class="control-label">{{ nome }}</label>

            <select class="form-control" id="country_birth">

            </select>


            <input type="text" name="name" class="form-control" value="{{ isset($profile->MoreInformation->country_birth) ? $profile->MoreInformation->country_birth : old('country_birth') }}">
        </div>
        @if ($errors->has('country_birth'))
            <span class="help-block">
                <strong class="red-text">{{ $errors->first('country_birth') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-2 {{ $errors->has('age') ? ' has-error' : '' }}">
        <div class="form-group label-floating">
            <label class="control-label">{{ idade }}</label>
            <input type="number" name="age" class="form-control age" value="{{ isset($profile->age) ? $profile->age : old('age') }}">
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
                @if(isset($profile->gender))
                    @if($profile->gender == 0)
                        <option value="0" selected>{{ feminino }}</option>
                        <option value="1">{{ masculino }}</option>
                    @else
                        <option value="0">{{ feminino }}</option>
                        <option value="1" selected>{{ masculino }}</option>
                    @endif

                @else
                    <option value="0">{{ feminino }}</option>
                    <option value="1">{{ masculino }}</option>
                @endif

            </select>
            @if ($errors->has('name'))
                <span class="help-block">
            <strong class="red-text">{{ $errors->first('name') }}</strong>
        </span>
            @endif
        </div>
    </div>
    <div class="col-md-4 {{ $errors->has('phone') ? ' has-error' : '' }}">
        <div class="form-group label-floating">
            <label class="control-label">{{ telefone }}</label>
            <input type="text" name="phone" class="form-control cell_phone" value="{{  isset($profile->phone) ? $profile->phone : old('phone') }}">
        </div>
        @if ($errors->has('phone'))
            <span class="help-block">
            <strong class="red-text ">{{ $errors->first('phone') }}</strong>
        </span>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <div class="form-group label-floating">
                <label class="control-label">{{ sobreVoce }}</label>
                <textarea class="form-control" name="about">{{  isset($profile->about) ? $profile->about : old('about') }}</textarea>
            </div>
        </div>
    </div>
    <div class="col-md-4 {{ $errors->has('photo_address') ? ' has-error' : '' }}">
        <label>Foto</label>
        <div class="file-field input-field">
            <input type="file" class="btn btn-info" name="photo_address">
        </div>
        @if ($errors->has('photo_address'))
            <span class="help-block">
            <strong class="red-text ">{{ $errors->first('photo_address') }}</strong>
        </span>
        @endif
    </div>
</div>


