@extends('admin.layouts.app')

@section('title','Congregações')

@section('content')
    <h1>Exibindo os places</h1>

    <hr>
    @include('admin.includes.alerts',['content' => 'Alerta de Congregações'])

    <hr>

    @component('admin.components.card')
    @slot('title')
        <h1>Titulo Card</h1>
    @endslot    
    Um card de exemplo
    @endcomponent

    {{ $places }}    
@endsection
