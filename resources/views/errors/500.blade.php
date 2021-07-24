@extends('layouts.app')

@section('title', '500 - erro interno no servidor')

@section('content')
    <div class="jumbotron">
        <h1>500</h1>
        <h2>Erro interno no servidor :-(</h2>
        <p>
            {!! $exception->getMessage() ? $exception->getMessage() . '<br>' : '' !!}
            Tente novamente ou entre em contato com o administrador.
        </p>
    </div>
@endsection
