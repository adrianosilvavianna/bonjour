<div class="row">
    <div class="col-md-2 {{ $errors->has('date') ? ' has-error' : '' }}">
        <div class="form-group  ">
            <label class="control-label">{{ dataPartida }}</label>

            @if(!empty($trip))
                <input type="date" class="form-control" name="date" min="{{ date('Y-m-d') }}" id="date" value="{{ $trip->date }}">
            @else
                <input type="date" class="form-control" name="date" min="{{ date('Y-m-d') }}" id="date" value="">
            @endif
        </div>
        @if ($errors->has('date'))
            <span class="help-block">
                <strong class="red-text">{{ $errors->first('date') }}</strong>
            </span>
        @endif
    </div>

    <div class="col-md-2 {{ $errors->has('time') ? ' has-error' : '' }}">
        <div class="form-group  ">
            <label class="control-label">{{ horaPartida }}</label>
            @if(!empty($trip))
                <input type="time" class="form-control" name="time" id="time" value="{{ $trip->time }}">
            @else
                <input type="time" class="form-control" name="time" id="time" value="">
            @endif
        </div>
        @if ($errors->has('time'))
            <span class="help-block">
                <strong class="red-text">{{ $errors->first('time') }}</strong>
            </span>
        @endif
    </div>

    <div class="col-md-4 {{ $errors->has('vehicle_id') ? ' has-error' : '' }}">
        <div class="form-group  ">
            <label class="control-label">{{ veiculo }}</label>

                <select type="text" name="vehicle_id" class="form-control" id="vehicle_id">
                    @if(!empty($trip))
                        <option value="{{ $trip->Vehicle->id }}">{{ marca }}: {{ $trip->Vehicle->brand }} || {{ modelo }}: {{ $trip->Vehicle->model }}</option>
                    @endif
                    @foreach($vehicles as $vehicle)
                        <option value="{{ $vehicle->id }}">{{ marca }}: {{ $vehicle->brand }} || {{ modelo }}: {{ $vehicle->model }}</option>
                    @endforeach
                </select>

        </div>
        @if ($errors->has('vehicle_id'))
            <span class="help-block">
                <strong class="red-text">{{ $errors->first('vehicle_id') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-md-2">
        <div class="form-group">
            <label class="control-label">{{ nPassageiros  }}</label>
            @if(!empty($trip))
                <input type="number" class="form-control" name="num_passenger" id="num_passenger" value="{{ $trip->num_passenger }}">
            @else
                <input type="number" class="form-control" name="num_passenger" id="num_passenger" value="">
            @endif
        </div>
    </div>
    <div class="col-md-1">
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="btnEnviar"/> {{ btnEnviar  }} </button>
        </div>
    </div>
</div>