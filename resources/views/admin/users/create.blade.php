@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cadastro de Usuário</div>
                    <div class="card-body">
                        <a class="text-success" href="{{ route('user.index') }}"><i
                                class="fas fa-long-arrow-alt-left"></i> Voltar para a listagem</a>
                        <form action="{{ route('user.store') }}" method="post" class="mt-4" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nome do usuário</label>
                                <input type="text" class="form-control" id="name"
                                    placeholder="Insira o nome completo do usuário" name="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="name">E-mail</label>
                                <input type="email" class="form-control" id="email" placeholder="Insira o email válido"
                                    name="email" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Senha</label>
                                <input type="password" class="form-control" id="password" placeholder="Insira a senha"
                                    name="password" value="{{ old('password') }}" required>
                            </div>
                            <button type="submit" class="btn btn-block btn-success">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
