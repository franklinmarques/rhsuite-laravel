@extends('layouts.app')

@section('title', '401 - não autorizado')

@section('content')
    <div class="jumbotron">
        <h1>401</h1>
        <h2>Não autorizado :-(</h2>
        <p>
            {!! $exception->getMessage() ? $exception->getMessage() . '<br>' : '' !!}
            Faça login ou entre em contato com o administrador.
        </p>
    </div>
@endsection
