@extends('layouts.app')
@section('content')
    <div class="container">
    <h1>Mostrar {{ $sala->nome }}</h1>
    <div class="jumbotron text-center">
        <h2>{{ $sala->nome }}</h2>
        <p>
            <strong>Unidade:</strong> {{ $sala->unidade->nome }}<br>
            <strong>Valor:</strong> {{ $sala->valor }}<br>
        </p>
    </div>
</div>

@endsection('content')