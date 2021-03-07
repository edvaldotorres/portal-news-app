@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Gestão de Permissão</div>
                    <div class="card-body">
                        <a class="text-success" href="{{ route('permission.create') }}"><i class="fas fa-plus"></i>
                            Cadastrar Permissão</a>
                        <table class="table table-striped mt-4">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Permissão</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td class="d-flex">
                                            <a class="mr-3 btn btn-sm btn-outline-success"
                                                href="{{ route('permission.edit', ['id' => $permission->id]) }}">Editar</a>
                                            <form action="{{ route('permission.destroy', ['id' => $permission->id]) }}"
                                                method="post">
                                                @method('delete')
                                                @csrf
                                                <input class="btn btn-sm btn-outline-danger" type="submit" value="Remover">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $permissions->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
