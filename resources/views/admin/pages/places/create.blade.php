@extends('admin.layouts.app')

@section('title', 'Nova Congregação')

@section('content')
    <h1>Cadastrar nova congregação</h1>
    <form action="{{ route('places.store') }}" method="post" enctype="multipart/form-data" class="form">
        @include('admin.pages.places._partials.form')        
    </form>
@endsection