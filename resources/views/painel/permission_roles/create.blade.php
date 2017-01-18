@extends('painel.templates.template')
@section('content')
    <div class="container">
        <h1>Adicionar Permissão de Role</h1>
        <!-- Mostra Mensagem -->

        <!-- if there are creation errors, they will show here -->
        {{ Html::ul($errors->all()) }}

        {{ Form::open(array('url' => 'painel/permission_roles')) }}


        {!! Form::label('role_id','Role') !!}
        {!! Form::select('role_id', $roles,null,['class'=>'form-control','placeholder'=>'*** Selecione o Role ***']) !!}
        <br>

        <?php $label = $permissions[0]->label; ?>

        <strong><?php echo explode(' ', $permissions[0]->label)[1]; $cont = 0;?> </strong><br>

        @foreach($permissions as $permission)
            @if($cont == 4)
                <br>
                <?php $label = $permission->label; $cont = 0;?>
                <strong><?php echo substr($label, 6); ?> </strong><br>
            @endif
            <?php $entitie = explode('-', $permission->name);$cont++; ?>
            {{ Form::checkbox('permissions[]', $permission->id) }} <?php echo ucfirst($entitie[1]); ?>
        @endforeach
        <br>
        <br>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        {{ Form::submit('Criar Role!', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
@endsection('content')
