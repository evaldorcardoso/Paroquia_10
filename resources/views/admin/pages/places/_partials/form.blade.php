@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <input type="text" class="form-control" placeholder="Nome da Congregação" name="nome" value="{{ $place->nome ?? old('nome') }}">
</div>        
<div class="form-group">
    <input type="text" class="form-control" name="localidade" placeholder="Localidade" value="{{ $place->localidade ?? old('localidade') }}"> 
</div>
<div class="form-group">
    <input type="text" class="form-control" name="pastor" placeholder="Nome do Pastor" value="{{ $place->pastor ?? old('pastor') }}">
</div>
<div class="form-group">
    <input type="file" class="form-control" name="imagem">
</div>
<button type="submit" class="btn btn-success">Salvar</button>