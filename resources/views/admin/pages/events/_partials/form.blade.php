@include('admin.includes.alerts')

@csrf
<div class="row">
    <div class="col-lg-12">
      <div class="form-group">
        <label class="bmd-label-floating">Título do evento</label>
        <input id="titulo" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group bmd-form-group is-filled">
        <label class="bmd-label-floating">Data</label>
        <input id="data" type="date" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group bmd-form-group is-filled">
        <label class="bmd-label-floating">Hora</label>
        <input id="hora" type="time" class="form-control">
      </div>
    </div>
  </div>              
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <div class="form-group">
          <label>Descrição do evento</label>
          <textarea id="descricao" class="form-control" rows="4"></textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
        <label class="bmd-label-floating">Local do evento</label>
        <input id="endereco" type="text" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <div class="form-group">
          <label>Auxiliares</label>
          <textarea id="auxiliares" class="form-control" rows="5"></textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <div class="form-group">
          <label>Leituras</label>
          <textarea id="leituras" class="form-control" rows="5"></textarea>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <div class="form-group">
          <label>Músicas</label>
          <textarea id="musica" class="form-control" rows="3"></textarea>
        </div>
      </div>
    </div>
  </div>
  <button type="button" onclick="salvarEvento();" class="btn btn-rose pull-right">salvar<div class="ripple-container"></div></button>