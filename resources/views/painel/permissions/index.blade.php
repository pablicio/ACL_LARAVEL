@extends('painel.templates.template')

@section('content')

    <!--Filters and actions-->
    <div class="actions">
        <div class="container">
            <a class="add" href="permissions/create">
                <i class="fa fa-plus-circle"></i>
            </a>

            <form class="form-search form form-inline">
                <input type="text" name="pesquisar" placeholder="Pesquisar?" class="form-control">
                <input type="submit" name="pesquisar" value="Encontrar" class="btn btn-success">
            </form>
        </div>


    </div><!--Actions-->
    <div class="container">
        <h1 class="title">
            Listagem das Permissões
        </h1>

        <table class="table table-hover">
            <tr>
                <th>Nome</th>
                <th>Label</th>
                <th width="200px">Ações</th>
            </tr>

            @foreach($permissions as $permission)
                <tr>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->label}}</td>
                    <td>
                        {{ Form::open(array('url' => 'painel/permissions/' . $permission->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        <button type="link" class="delete"><i class="fa fa-trash"></i></button>
                        {{ Form::close() }}

                        <a href="{{url("/painel/roles/$permission->id/edit")}}">
                            <button class="add"><i class="glyphicon glyphicon-plus"></i></button>
                        </a>

                        <a href="{{url("/painel/permissions/$permission->id/roles")}}">
                            <button  class="permission"><i class="fa fa-unlock"></i></button>
                        </a>
                        <a href="{{url("/painel/permissions/$permission->id/edit")}}">
                            <button  class="edit"><i class="fa fa-pencil-square-o"></i></button>
                        </a>
                    </td>
            @endforeach
        </table>
        {{$permissions->render()}}

    </div>
@endsection