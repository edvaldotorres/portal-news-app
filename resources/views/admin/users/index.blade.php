@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Gestão de Usuários</div>
                    <div class="card-body">
                        @can('Gestão de Usuários: Cadastrar Usuário')
                            <a class="text-success" href="{{ route('user.create') }}"><i class="fas fa-plus"></i> Cadastrar
                                Usuário</a>
                        @endcan
                        <table class="table table-striped mt-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Usuário</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td class="d-flex">
                                            @can('Gestão de Usuários: Editar Usuário')
                                                <a class="mr-3 btn btn-sm btn-outline-success"
                                                    href="{{ route('user.edit', ['id' => $user->id]) }}">Editar</a>
                                            @endcan
                                            @can('Gestão de Usuários: Perfil do Usuário')
                                                <a class="mr-3 btn btn-sm btn-outline-info"
                                                    href="{{ route('user.role', ['id' => $user->id]) }}">Perfis</a>
                                            @endcan
                                            @can('Gestão de Usuários: Remover Usuário')
                                                <form action="{{ route('user.destroy', ['id' => $user->id]) }}" method="post">
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
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
