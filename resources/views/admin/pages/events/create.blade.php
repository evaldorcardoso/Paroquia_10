@extends('admin.layouts.app')

@section('title', 'Novo Evento')

@section('content')
    <h1>Cadastrar novo Evento</h1>

    <form action="{{ route('events.store') }}" method="post" enctype="multipart/form-data" class="form">
        @include('admin.pages.events._partials.form')        
    </form>
@endsection