@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cadastro de Permissão</div>
                    <div class="card-body">
                        <a class="text-success" href="{{ route('permission.index') }}"><i class="fas fa-long-arrow-alt-left"></i> Voltar para a listagem</a>
                        <form action="{{ route('permission.store') }}" method="post" class="mt-4" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nome da permissão</label>
                                <input type="text" class="form-control" id="name" placeholder="Insira o nome da permissão"
                                       name="name" value="{{ old('name') }}" required>
                            </div>
                            <button type="submit" class="btn btn-block btn-success">Cadastrar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
