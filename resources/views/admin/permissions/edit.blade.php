@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Permissão</div>

                    <div class="card-body">

                        <a class="text-success" href="{{ route('permission.index') }}"><i class="fas fa-long-arrow-alt-left"></i> Voltar para a listagem</a>

                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger mt-4" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <form action="{{ route('permission.update', ['id' => $permission->id]) }}" method="post" class="mt-4" autocomplete="off">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nome da permissão</label>
                                <input type="text" class="form-control" id="name" placeholder="Insira o nome da permissão"
                                       name="name" value="{{ old('name') ?? $permission->name }}">
                            </div>

                            <button type="submit" class="btn btn-block btn-success">Editar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
