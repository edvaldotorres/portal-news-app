@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Permissões</div>
                    <div class="card-body">
                        <a class="text-success" href="{{ route('role.index') }}"><i class="fas fa-long-arrow-alt-left"></i> Voltar para a listagem</a>
                        <h2 class="mt-4">Permissões para: {{ $role->name }}</h2>
                        <form action="{{ route('role.permissionSync', ['id' => $role->id]) }}" method="post" class="mt-4" autocomplete="off">
                            @csrf
                            @method('PUT')
                           @foreach($permissions as $permission)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="{{ $permission->id }}" name="{{ $permission->id }}" {{ $permission->can == '1' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="{{ $permission->id }}">{{ $permission->name }}</label>
                                </div>
                           @endforeach
                            <button type="submit" class="btn btn-block btn-success mt-4">Sincronizar perfil</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
