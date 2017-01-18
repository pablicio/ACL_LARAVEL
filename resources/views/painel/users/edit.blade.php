@extends('painel.templates.template')
@section('content')
    <div class="container">

        <h1>Editar: {{ $users->nome }}</h1>

        @if (Session::has('mensagem'))
            <div class="alert alert-danger">{{ Session::get('mensagem') }}</div>
        @endif

    <!-- if there are creation errors, they will show here -->
        {{ Html::ul($errors->all()) }}
        {{ Form::model($users, array('route' => array('users.update', $users->id), 'method' => 'PUT')) }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">Nome</label>
            <input id="name" type="text" class="form-control" name="name" value="{{$users->name}}" required autofocus>
            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>


        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">E-Mail</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ $users->email or old('email') }}"
                   required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        @if($users->id === auth()->user()->id)
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="senha_atual">Senha Atual</label>
                <input id="senha_atual" type="password" class="form-control" name="senha_atual" required
                       placeholder="Senha Atual">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        @endif

        <div class="form-group">
            <label for="roles">Roles</label>

            <select id="roles" class="form-control" multiple name="roles[]">
                @forelse($roles as $role)
                    <option value="{{ $role->id }}" @if($userRoles->contains($role->id)) selected @endif>{{ $role->name }}</option>
                @empty
                    <option disabled>Nenhuma role encontrada</option>
                @endforelse
            </select>
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('password','Senha') !!}
            {!! Form::input('text','password','',['class'=>'form-control','placeholder'=>'Senha']) !!}
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            {!! Form::label('password-confirm','Confirme a Senha') !!}
            {!! Form::input('text','password_confirmation','',['class'=>'form-control','placeholder'=>'Confirme a Senha']) !!}
        </div>


        {{ Form::submit('Editar Usuário!', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
@endsection('content')
