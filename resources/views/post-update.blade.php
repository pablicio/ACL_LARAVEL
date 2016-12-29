@extends('layouts.app')

@section('content')
    <div class="container">
            <h3>{{$post->title}}</h3>
            <p>{{$post->description}}</p>
            <br>
            <b>Autor: {{$post->user->name}}</b>
            <hr>
    </div>
@endsection
