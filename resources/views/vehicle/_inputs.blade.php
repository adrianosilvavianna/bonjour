<div class="row">
    <div class="col-lg-4 {{ $errors->has('brand') ? ' has-error' : '' }}">
        <div class="form-group ">
            <label for="marcas">Marcas</label>
            <select class="form-control form-control-lg" id="marcas" name="brand">
                <option value="{{ isset($vehicle->brand) ? $vehicle->brand : '' }}"
                        @if(isset($vehicle->brand)) selected @endif>{{ isset($vehicle->brand) ? $vehicle->brand : '' }}</option>
            </select>
        </div>

        @if ($errors->has('brand'))
            <span class="help-block">
                <strong class="red-text">{{ $errors->first('brand') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-lg-4 {{ $errors->has('model') ? ' has-error' : '' }}">

        <div class="form-group">
            <label for="modelos">Modelos</label>
            <select class="form-control form-control-lg" id="modelos" name="model">

                <option value="{{ isset($vehicle->model) ? $vehicle->model : '' }}"
                        @if(isset($vehicle->model)) selected @endif>{{ isset($vehicle->model) ? $vehicle->model : '' }}</option>
            </select>
        </div>

        @if ($errors->has('model'))
            <span class="help-block">
                    <strong class="red-text">{{ $errors->first('model') }}</strong>
                </span>
        @endif
    </div>
    <div class="col-lg-4 {{ $errors->has('color') ? ' has-error' : '' }}">
        <div class="form-group ">
            <label class="">Cor</label>
            <select class="form-control form-control-lg" id="color" name="color">
                <option selected>{{ isset($vehicle->color) ? $vehicle->color : 'Prata' }}</option>
                <option>Prata</option>
                <option>Preto</option>
                <option>Branco</option>
                <option>Cinza</option>
                <option>Cinza claro</option>
                <option>Cinza escuro</option>
                <option>Marrom</option>
                <option>Vermelho</option>
                <option>Vermelho claro</option>
                <option>Vermelho escuro</option>
                <option>Azul</option>
                <option>Azul claro</option>
                <option>Azul escuro</option>
                <option>Bege</option>
                <option>Verde</option>
                <option>Verde claro</option>
                <option>Verde escuro</option>
                <option>Amarelo</option>
                <option>Amarelo claro</option>
                <option>Amarelo escuro</option>
                <option>Grafite</option>
                <option>Dourado</option>
                <option>Laranja</option>
                <option>Rosa</option>
                <option>Bordo</option>
                <option>Violeta</option>
                <option>Lilas</option>
            </select>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-lg-4 {{ $errors->has('year') ? ' has-error' : '' }}">
        <div class="form-group ">
            <label class="control-label">Ano</label>
            <input type="number" name="year" id="year" class="form-control"
                   value="{{ isset($vehicle->year) ? $vehicle->year : date('Y') }}" min="1980" max="{!! date('Y') !!}">
        </div>
        @if ($errors->has('year'))
            <span class="help-block">
                <strong class="red-text">{{ $errors->first('year') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-lg-4 {{ $errors->has('plaque') ? ' has-error' : '' }}">
        <div class="form-group ">
            <label class="control-label">Placa</label>
            <input type="text" name="plaque" class="form-control plaque"
                   value="{{ isset($vehicle->plaque) ? $vehicle->plaque :'' }}" style="TEXT-TRANSFORM: uppercase">
        </div>
        @if ($errors->has('plaque'))
            <span class="help-block">
                <strong class="red-text">{{ $errors->first('plaque') }}</strong>
            </span>
        @endif
    </div>
    <div class="col-lg-4  {{ $errors->has('num_passenger') ? ' has-error' : '' }}">
        <div class="form-group ">
            <label class="control-label">N° passageiros</label>
            <input type="number" name="num_passenger" id="num_passenger" class="form-control"
                   value="{{ isset($vehicle->num_passenger) ? $vehicle->num_passenger : '' }}" min="1" max="10">
        </div>
        @if ($errors->has('plaque'))
            <span class="help-block">
                <strong class="red-text">{{ $errors->first('plaque') }}</strong>
            </span>
        @endif
    </div>
</div>
