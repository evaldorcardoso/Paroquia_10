@include('admin.includes.alerts')

@csrf
<div class="row">
    <div class="col-lg-12">
      <div class="form-group">
        <label class="bmd-label-floating">Título do evento</label>
        <input name="title" type="text" class="form-control" value={{ $event['title'] ?? old('title') }}>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group bmd-form-group is-filled">
        <label class="bmd-label-floating">Data</label>
        <input name="event_at_d" type="date" class="form-control" value="{{ isset($event) ? substr($event['event_at'],0,10) : old('event_at_d') }}">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group bmd-form-group is-filled">
        <label class="bmd-label-floating">Hora</label>
        <input name="event_at_h" type="time" class="form-control" value="{{ isset($event) ? substr($event['event_at'],11) : old('event_at_h') }}">
      </div>
    </div>
  </div>              
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <div class="form-group">
          <label>Descrição do evento</label>
          <textarea name="description" class="form-control" rows="4">{{ $event['description'] ?? old('description') }}</textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
        <label class="bmd-label-floating">Local do evento</label>
        <input name="address" type="text" class="form-control" value="{{ $event['address'] ?? old('address') }}">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <div class="form-group">
          <label>Auxiliares</label>
          <textarea name="auxiliars" class="form-control" rows="5">{{ $event['auxiliars'] ?? old ('auxiliars') }}</textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <div class="form-group">
          <label>Leituras</label>
          <textarea name="readings" class="form-control" rows="5">{{ $event['readings'] ?? old('readings') }}</textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <div class="form-group">
          <label>Músicas</label>
          <textarea name="musics" class="form-control" rows="3">{{ $event['musics'] ?? old('musics') }}</textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="pull-right">
    <a href="{{ route('events.index',$congregacao['id']) }}">Voltar</a>
    <button type="submit" class="btn btn-rose" style="margin-left: 30px;">{{ isset($event) ? 'Atualizar Evento' : 'Criar Evento' }}<div class="ripple-container"></div></button>
  </div>