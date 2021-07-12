@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <input type="text" class="form-control" placeholder="Título do Evento" name="title" value="{{ $event->title ?? old('title') }}">
</div>        
<div class="form-group">
    <input type="text" class="form-control" name="address" placeholder="Endereço" value="{{ $event->address ?? old('address') }}"> 
</div>
<div class="form-group">
    <input type="datetime-local" class="form-control" name="event_at" placeholder="Data e Hora" value="{{ $event->event_at ?? old('event_at') }}">
</div>
<button type="submit" class="btn btn-success">Salvar</button>