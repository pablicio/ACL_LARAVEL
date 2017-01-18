@extends('painel.templates.template')
@section('content')
    <div class="container">
        <h1>Adicionar Permissão</h1>
        <!-- Mostra Mensagem -->

        <!-- if there are creation errors, they will show here -->
        {{ Html::ul($errors->all()) }}

        {{ Form::open(array('url' => 'painel/permissions')) }}

        {!! Form::label('name','Nome') !!}
        {!! Form::input('text','name',null,['class'=>'form-control','placeholder'=>'Nome']) !!}
        <br>
        {!! Form::label('label','Label') !!}
        {!! Form::input('text','label',null,['class'=>'form-control','placeholder'=>'Label']) !!}
        <br>
        {{ Form::submit('Criar Permissão!', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}
    </div>
@endsection('content')
