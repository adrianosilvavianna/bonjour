@section('css')
    @parent
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    @show

<div class="col-md-6">
    <div class="form-group label-floating {{ $errors->has('foreign') ? ' has-error' : '' }}">
        <label class="control-label">É extrangeiro?</label>
        <input type="radio" name="foreign" value="1">Sim
        <input type="radio" name="foreign" value="0">Não
        @if ($errors->has('foreign'))
            <span class="help-block">
                    <strong class="red-text">{{ $errors->first('foreign') }}</strong>
                </span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-6 {{ $errors->has('country_birth') ? ' has-error' : '' }}">
        <div class="form-group label-floating">
            <label class="control-label">País onde nasceu</label>

            <select class="form-control" id="country_birth">

            </select>
            {{--{{ isset($moreInformation->country_birth) ? $moreInformation->country_birth : old('country_birth') }}--}}
        </div>
        @if ($errors->has('country_birth'))
            <span class="help-block">
                <strong class="red-text">{{ $errors->first('country_birth') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-md-2 {{ $errors->has('date_birth') ? ' has-error' : '' }}">
        <div class="form-group label-floating">
            <label class="control-label">Data de nascimento</label>
            <input type="date" name="date_birth" class="form-control placeholder_date" value="{{ isset($moreInformation->date_birth) ? $moreInformation->date_birth : old('date_birth') }}">
        </div>
        @if ($errors->has('date_birth'))
            <span class="help-block">
            <strong class="red-text">{{ $errors->first('date_birth') }}</strong>
        </span>
        @endif
    </div>
    <div class="col-md-4 {{ $errors->has('confidence_phone') ? ' has-error' : '' }}">
        <div class="form-group label-floating">
            <label class="control-label">Possui um segundo telefone ou de alguém de confiança?</label>
            <input type="text" name="confidence_phone" class="form-control cell_phone" value="{{ isset($moreInformation->confidence_phone) ? $moreInformation->confidence_phone : old('confidence_phone') }}">
        </div>
        @if ($errors->has('confidence_phone'))
            <span class="help-block">
            <strong class="red-text ">{{ $errors->first('confidence_phone') }}</strong>
        </span>
        @endif
    </div>
</div>

@section('scripts')

@show

