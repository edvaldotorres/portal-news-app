@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Gestão de Perfil</div>
                    <div class="card-body">
                        @can('Gestão de Perfis: Cadastrar Perfil')
                            <a class="text-success" href="{{ route('role.create') }}"><i class="fas fa-plus"></i> Cadastrar
                                Perfil</a>
                        @endcan
                        <table class="table table-striped mt-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Perfil</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td class="d-flex">
                                            @can('Gestão de Perfis: Editar Perfil')
                                                <a class="mr-3 btn btn-sm btn-outline-success"
                                                    href="{{ route('role.edit', ['id' => $role->id]) }}">Editar</a>
                                            @endcan
                                            @can('Gestão de Perfis: Permissões do Perfil')
                                                <a class="mr-3 btn btn-sm btn-outline-info"
                                                    href="{{ route('role.permission', ['id' => $role->id]) }}">Permissões</a>
                                            @endcan
                                            @can('Gestão de Perfis: Remover Perfil')
                                                <form action="{{ route('role.destroy', ['id' => $role->id]) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input class="btn btn-sm btn-outline-danger" type="submit" value="Remover">
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $roles->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
