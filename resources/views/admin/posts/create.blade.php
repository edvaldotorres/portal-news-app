@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>{{ __('Cadastro de Notícia') }}</span>
                            <small>Cadastrar notícia como:
                                <strong>{{ Auth::check() ? Auth::user()->name : 'Anônimo' }}</strong></small>
                        </div>
                    </div>
                    <div class="card-body">
                        <a class="text-success" href="{{ route('post.index') }}"><i
                                class="fas fa-long-arrow-alt-left"></i> Voltar para a listagem</a>
                        <form action="{{ route('post.store') }}" method="post" class="mt-4" autocomplete="off">
                            @csrf
                            <div class="form-group">
                                <label for="title">Título</label>
                                <input type="text" class="form-control" id="title" placeholder="Insira o título da notícia"
                                    name="title" value="{{ old('title') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Lead</label>
                                <input id="lead" placeholder="Insira a lead da notícia" type="text"
                                    class="form-control{{ $errors->has('lead') ? ' is-invalid' : '' }}" name="lead"
                                    value="{{ old('lead') }}" maxlength="190" required>
                            </div>
                            <div class="form-group">
                                <label for="content">Conteúdo</label>
                                <textarea class="form-control" id="content" rows="10" name="content"
                                    placeholder="Insira o conteúdo..." required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="content">Publicado</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="published" value="1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Sim
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="published" value="0">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Não
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-success">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
