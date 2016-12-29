@extends('layouts.app')

@section('content')
    <div class="container">

        @forelse($posts as $post)
            @can('view_post',$post )
                <h3>{{$post->title}}</h3>
                <p>{{$post->description}}</p>
                <br>
                <b>Autor: {{$post->user->name}}</b>
                @can('editar_post',$post)
                    <a href="{{url("/post/$post->id/update")}}">Editar</a>
                @endcan
                <hr>
            @endcan
                <h1>fora</h1>

        @empty

            {{'Nenhum post cadastrado'}}

        @endforelse
    </div>
@endsection
