@extends('layouts.app')

@section('title', '404 - não encontrado')

@section('content')
    <div class="jumbotron">
        <h1>404</h1>
        <h2>Não encontrado :-(</h2>
        <p>
            {!! $exception->getMessage() ? $exception->getMessage() . '<br>' : '' !!}
            Verifique a url e tente novamente, ou entre em contato com o administrador.
        </p>
    </div>
@endsection
