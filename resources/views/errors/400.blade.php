@extends('layouts.app')

@section('title', '400 - solicitação incorreta')

@section('content')
    <div class="jumbotron">
        <h1>400</h1>
        <h2>Solicitação incorreta :-(</h2>
        <p>
            {!! $exception->getMessage() ? $exception->getMessage() . '<br>' : '' !!}
            Verifique a url e tente novamente, ou entre em contato com o administrador.
        </p>
    </div>
@endsection
