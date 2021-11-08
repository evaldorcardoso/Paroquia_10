@include('admin.includes.alerts')

@csrf
<div class="row">
    <div class="col-lg-12">
      <div class="form-group">
        <label class="bmd-label-floating">Nome da Congregação</label>
        <input name="name" type="text" class="form-control" maxLength="100" value="{{ $user->name ?? old('name') }}">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <label class="bmd-label-floating">Endereço</label>
        <input name="address" type="text" class="form-control" maxLength="200" value="{{ $user->address ?? old('address') }}">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10">
      <div class="form-group">
        <label class="bmd-label-floating">Pastor</label>
        <input name="shepherd" type="text" class="form-control" maxLength="200" value="{{ $user->shepherd ?? old('shepherd') }}">
      </div>
    </div>
    <div class="col-md-2">
      <h4 class="title">Congregação Ativa?</h4>
      <div class="togglebutton">
        <label>          
          <input name="visible" type="checkbox" {{ $user->visible ? 'checked' : '' }}>
          <span class="toggle"></span>Sim
        </label>
      </div>
    </div>
  </div><br>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
          <div class="form-group">
            <label>Descrição</label><br><br>
            <textarea name="description" class="form-control" rows="5">{{ $user->description ?? old('description') }}</textarea>            
          </div>
      </div>
    </div>
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-rose pull-center">Atualizar dados</button>
  </div>
  <div class="clearfix"></div>