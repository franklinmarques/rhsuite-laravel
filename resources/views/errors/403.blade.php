@extends('layouts.app')

@section('title', '403 - acesso negado')

@section('content')
    <div class="jumbotron">
        <h1>403</h1>
        <h2>Acesso negado :-(</h2>
        <p>
            {!! $exception->getMessage() ? $exception->getMessage() . '<br>' : '' !!}
            Tente novamente ou solicite o acesso ao administrador.
        </p>
    </div>
@endsection
