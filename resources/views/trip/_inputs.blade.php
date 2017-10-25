<div class="row">
    <div class="col-md-4 {{ $errors->has('date') ? ' has-error' : '' }}">
        <div class="form-group  ">
            <label class="control-label">Data de partida</label>
            <input type="date" class="form-control" name="date" min="{{ date('Y-m-d') }}" id="date" value="{{ $trip->date }}">
        </div>
        @if ($errors->has('date'))
            <span class="help-block">
                <strong class="red-text">{{ $errors->first('date') }}</strong>
            </span>
        @endif
    </div>

    <div class="col-md-2 {{ $errors->has('time') ? ' has-error' : '' }}">
        <div class="form-group  ">
            <label class="control-label">Hora de partida</label>
            <input type="time" class="form-control" name="time" id="time" value="{{ $trip->time }}">
        </div>
        @if ($errors->has('time'))
            <span class="help-block">
                <strong class="red-text">{{ $errors->first('time') }}</strong>
            </span>
        @endif
    </div>

    <div class="col-md-4 {{ $errors->has('vehicle_id') ? ' has-error' : '' }}">
        <div class="form-group  ">
            <label class="control-label">Veículo</label>
            <select type="text" name="vehicle_id" class="form-control" >
                <option value="{{ $trip->Vehicle->id }}">Marca: {{ $trip->Vehicle->brand }} || Modelo: {{ $trip->Vehicle->model }}</option>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">Marca: {{ $vehicle->brand }} || Modelo: {{ $vehicle->model }}</option>
                @endforeach
            </select>
        </div>
        @if ($errors->has('vehicle_id'))
            <span class="help-block">
                <strong class="red-text">{{ $errors->first('vehicle_id') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="btnEnviar"/> Enviar </button>
        </div>
    </div>
</div>