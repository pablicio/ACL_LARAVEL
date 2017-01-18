@extends('painel.templates.template')

@section('content')


    <!--Filters and actions-->
    <div class="actions">
        <div class="container">
            <a class="add" href="users/create">
                <i class="fa fa-plus-circle"></i>
            </a>

            <form class="form-search form form-inline">
                <input type="text" name="pesquisar" placeholder="Pesquisar?" class="form-control">
                <input type="submit" name="pesquisar" value="Encontrar" class="btn btn-success">
            </form>
        </div>


    </div><!--Actions-->
    @if (Session::has('mensagem'))
        <div class="alert alert-sucess">{{ Session::get('mensagem') }}</div>
    @endif
    <div class="container">
        <h1 class="title">
            Listagem dos usuários
        </h1>

        <table class="table table-hover">
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th width="200px">Ações</th>
            </tr>

            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        {{ Form::open(array('url' => 'painel/users/' . $user->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        <button type="link" class="delete"><i class="fa fa-trash"></i></button>
                        {{ Form::close() }}

                        <a href="{{url("/painel/permission_users/edit/".$user->id)}}">
                            <button class="add"><i class="glyphicon glyphicon-plus"></i></button>
                        </a>

                        <a href="{{url("/painel/users/$user->id/roles")}}">
                            <button class="permission"><i class="fa fa-unlock"></i></button>
                        </a>
                        <a href="{{url("/painel/users/$user->id/edit")}}">
                            <button class="edit"><i class="fa fa-pencil-square-o"></i></button>
                        </a>
                    </td>
            @endforeach
        </table>
        {!! $users->render() !!}

    </div>
@endsection