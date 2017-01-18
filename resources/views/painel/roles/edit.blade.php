@extends('painel.templates.template')
@section('content')
<div class="container">

    <h1>Editar: {{ $roles->nome }}</h1>
    <!-- if there are creation errors, they will show here -->
    {{ Html::ul($errors->all()) }}
    {{ Form::model($roles, array('route' => array('roles.update', $roles->id), 'method' => 'PUT')) }}

    {!! Form::label('name','Nome') !!}
    {!! Form::input('text','name',null,['class'=>'form-control','placeholder'=>'Nome']) !!}
    <br>
    {!! Form::label('label','Label') !!}
    {!! Form::input('text','label',null,['class'=>'form-control','placeholder'=>'Label']) !!}
    <br>
    {{ Form::submit('Editar Role!', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
</div>
@endsection('content')
