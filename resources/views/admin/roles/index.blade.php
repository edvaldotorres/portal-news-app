@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Gestão de Perfil</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a class="text-success" href="{{ route('role.create') }}"><i class="fas fa-plus"></i> Cadastrar Perfil</a>

                        @if ($errors)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger mt-4" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

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
                                            <a class="mr-3 btn btn-sm btn-outline-success"
                                                href="{{ route('role.edit', ['id' => $role->id]) }}">Editar</a>
                                            <a class="mr-3 btn btn-sm btn-outline-info"
                                                href="{{ route('role.permission', ['id' => $role->id]) }}">Permissões</a>
                                            <form action="{{ route('role.destroy', ['id' => $role->id]) }}" method="post">
                                                @csrf
                                                <input class="btn btn-sm btn-outline-danger" type="submit" value="Remover">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
