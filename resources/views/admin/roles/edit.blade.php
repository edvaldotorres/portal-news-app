@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Perfil</div>
                    <div class="card-body">
                        <a class="text-success" href="{{ route('role.index') }}"><i
                                class="fas fa-long-arrow-alt-left"></i> Voltar para a listagem</a>
                        <form action="{{ route('role.update', ['id' => $role->id]) }}" method="post" class="mt-4"
                            autocomplete="off">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nome do perfil</label>
                                <input type="text" class="form-control" id="name" placeholder="Insira o nome do perfil"
                                    name="name" value="{{ old('name') ?? $role->name }}" required>
                            </div>
                            <button type="submit" class="btn btn-block btn-success">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
